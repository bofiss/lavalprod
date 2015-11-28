$(function(){
    $('#record').click(function(){
        elt=$(this);
        
            Fr.voice.record(false, function(){
                elt.html('Stop Recording');
                elt.attr('disabled', true);
            });
             save();
      
      
 });       
    
    $('#play').click(function(){
        Fr.voice.export(function(url){
            $("#audio").attr('controls', false);
            $("#audio").attr('src', url);
            $("#audio")[0].play();
            $("#record").attr('disabled', false);
             $("#record").html('Start Recording');
             
        }, "URL");
       end();
    });
    
    $('#reset').click(function(){
          Fr.voice.export(function(mp3){
            console.log(mp3);
        });
        end();
    });
});

var end = function(){
    Fr.voice.stop();
}

var save = function(){
    Fr.voice.export(function(mp3){
    var data = new FormData();
    data.append('file', mp3);
    
    $.ajax({
      url: "/player/save",
      type: 'POST',
      data: data,
      contentType: false,
      processData: false,
      success: function(data) {
        console.log("is send youpi!");
      }
    });
}, "mp3");
}