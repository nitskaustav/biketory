<?php ?> 


<div id="content">
    <div class="inner">
        <div class="row">
            <div class="col-lg-12">
                <h1 > Add Colour </h1>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <header>
                        <div class="icons"><i class="icon-th-large"></i></div>
                        <h5>Add Colour</h5>
                        <div class="toolbar">
                            <ul class="nav">
                                <li style="margin-right:15px">
                                    <div class="btn-group"> 

                                    </div>
                                </li>

                            </ul>
                        </div>
                    </header>
                    <div id="collapseOne" class="accordion-body collapse in body">
                        <div class="col-sm-6">

                            <div class="row">
                                <?php echo $this->Form->create('colour', ['class' => 'form-horizontal', 'id' => 'user-validate', 'enctype' => 'multipart/form-data']); ?>

                                <div class="form-group">
                                    <label class="control-label col-lg-4">  Name </label>
                                    <?php echo '<div class = "col-lg-8">' . $this->Form->input('name', array('class' => 'form-control', 'label' => false, 'style' => 'width:800px')) . '</div>'; ?>
                                </div>

                                
                                <label class="control-label col-lg-4"></label>
                                <div class="col-lg-8" style="text-align:left;"> 
                                    <input type="submit" name="submit" value="Add" class="btn btn-primary" />
                                </div>
                                </form>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {       
        $("#name").keyup(function () {
            var Text = $(this).val();
            Text = Text.toLowerCase();
            Text = Text.replace(/[^a-zA-Z0-9]+/g, '-');
            $("#slug").val(Text);
        });
    });
</script>

