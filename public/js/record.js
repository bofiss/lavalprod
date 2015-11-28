var audio_context;
  var recorder;
$(function(){

	
    init();
    $('#record').click(function(e){
      e.preventDefault();
      if($(this).text() == "Start Record"){
        recorder && recorder.record();
        $(this).html('Stop Record');
         __log('Recording...');
        
      }else{
        recorder && recorder.stop();
         $(this).attr('disabled', false) ;
            __log('Stopped recording.');
      }
    });
    $('#play').click(function(e){
        createDownloadLink();
    });
    $('#reset').click(function(e){
        recorder.clear();
        log.innerHTML ="";
    });
   
 
});

   var createDownloadLink= function () {
        recorder && recorder.exportWAV(function(blob) {
        var url = URL.createObjectURL(blob);
        var li = document.createElement('li');
        var au = document.createElement('audio');
        var hf = document.createElement('a');
        
        au.controls = true;
        au.src = url;
        au.play();
        hf.href = url;
        hf.download = new Date().toISOString() + '.wav';
        hf.innerHTML = hf.download;
        li.appendChild(au);
        li.appendChild(hf);
        recordingslist.appendChild(li);
      });
   }
   
  
  var init = function(){
     try {
      // webkit shim
      window.AudioContext = window.AudioContext || window.webkitAudioContext;
      navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia||navigator.mozGetUserMedia ||
                       navigator.msGetUserMedia;
      window.URL = window.URL || window.webkitURL;
      
      audio_context = new AudioContext;
      __log('Audio context set up.');
      __log('navigator.getUserMedia ' + (navigator.getUserMedia ? 'available.' : 'not present!'));
    } catch (e) {
      alert('No web audio support in this browser!');
    }
    
    navigator.getUserMedia(
                           {audio: true},
                           
                           function(stream){
                                var input = audio_context.createMediaStreamSource(stream);
                             __log('Media stream created.');
                             // Uncomment if you want the audio to feedback directly
                             //input.connect(audio_context.destination);
                             //__log('Input connected to audio context destination.');
                             
                             recorder = new Recorder(input);
                               __log('Recorder initialised.');
                            },
                            
                           function(e) {
                              __log('No live audio input: ' + e);
                            });
  }
  
  var __log =function(e, data) {
    log.innerHTML += "\n" + e + " " + (data || '');
  }
  