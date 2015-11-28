<div class="container contcolor">
    <div id="deco_blanc3"></div>
    <div class="col-sm-12 cadre">
        <div class="entete"></div>
        <div class="panel">
            <div class="panel-heading enteteFlou">
                <h1>MEDIAS</h1>

                <div class="cercle">
                    <img
                        src="<?php echo URL ?>img/connexion.png"
                        alt="logo" height="63px" width="71px"
                        style="top: 18px; position: relative; left: 12px"/>
                </div>
            </div>
            <div class="panel-body panelCategorie panelSession">
                <div class="panel panel-default">
                    <div class="panel-body containerEditForm">

                        <?php
                        if(isset($this->currentMedia)):

                            echo "<h1>Edit Media</h1>";
                            echo '<form class="form-horizontal" data-toggle="validator" method="post" action="/media/update/">';

                        ?>



                        <fieldset>
                            <!-- Text input-->

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input id="brick[name]" name="brick[name]" type="text"
                                           placeholder="Brick name" value="<?php if (isset($this->currentMedia)) {
                                        echo $this->currentMedia['title'];
                                    } ?>"
                                           class="floating-label form-control input-md" required>
                                </div>
                            </div>
                            <div id="dynamicForm">
                                <div class="rows col-lg-6">
                                    <div class="form-group"><input id="brick[media]" name="brick[media]" type="text"
                                                                   readonly="" class="form-control floating-label"
                                                                   placeholder="<?php if (isset($this->currentMedia)) {
                                                                       echo $this->currentMedia['url'];
                                                                   } else echo "Upload File..."?>" value="<?php if (isset($this->currentMedia)) {
                                            echo $this->currentMedia['type'];
                                        }?>"> <input type="file" id="inputFile"  required>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group text-right">
                                <button type="submit" id="brick[save]" name="brick[save]"
                                        class="btn btn-primary">Save
                                </button>
                            </div>
                        </fieldset>
                        </form>
                    </div>
                </div>
                <?php endif; ?>
                <h1>Medias list</h1>
                <table id="brickTable" class="table table-striped table-hover text-center">
                    <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Title</th>
                        <th class="text-center">Url</th>
                        <th class="text-center">Type</th>
                        <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($this->medias as $media) :?>
                        <tr>
                            <td><?php echo $media['id']; ?></td>
                            <td><?php echo $media['title']; ?></td>
                            <td><?php echo $media['url']; ?></td>
                            <td><?php echo $media['type']; ?></td>
                            <td>
                                <a href="/media/index/<?php echo $media['id']; ?>"><button type="button" class="btn btn-flat btn-info btn-sm btn-td">edit</button></a>
                                <a href="/media/delete/<?php echo $media['id']; ?>"><button type="button" class="btn btn-flat btn-warning btn-sm btn-td">delete</button></a>
                            </td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>

                </table>
                <div class="pagingBrick"></div>
            </div>
        </div>
    </div>
</div>