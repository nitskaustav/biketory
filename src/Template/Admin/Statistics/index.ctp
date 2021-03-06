
<?php echo $this->Html->script('/plugins/dataTables/jquery.dataTables.js')?>
<?php echo $this->Html->script('/plugins/dataTables/dataTables.bootstrap.js')?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script>
    $(document).ready(function () {
        $('#dataTables-example').dataTable();
    });
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>

<script language="javascript" type="text/javascript">

    function deleteConfirm()
    {
        var x = window.confirm("Are you sure you want to delete this?")
        if (x)
        {
            return true;
        }
        else
        {
            return false;
        }
        return false;
    }
</script>


<!--PAGE CONTENT -->
<div id="content">
    <div class="inner">
        <div class="row">
            <div class="col-lg-12">
                <h1 > Statistics </h1>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <header>
                        <div class="icons"><i class="icon-th-large"></i></div>
                        <h5> Statistics</h5>
                        <div class="toolbar">
                            
                        </div>
                    </header>
                    <div class="accordion-body collapse in body">
                        <div class="col-sm-12">
                            <div class="row">  
                                <?php echo $this->Form->create('Filter', array('class'=>'form-inline','type'=>'get','id'=>'search_form'));?>
                                <div class="form-group">
                                    <select class="form-control"  name='day' id="day" onclick="search()">
                                        <option value=''>Select</option>
                                        <option value='1' <?php if($_REQUEST['day']==1){echo 'selected';} ?>> Today</option>
                                        <option value='7' <?php if($_REQUEST['day']==7){echo 'selected';} ?>>Past 7 days</option>
                                        <option value='30' <?php if($_REQUEST['day']==30){echo 'selected';} ?>>Past 30 days</option>
                                        <option value='365' <?php if($_REQUEST['day']==365){echo 'selected';} ?>>1 Year</option>

                                    </select>
                                  
                                </div>
                                <!--<button type="submit" class="btn btn-success" style='margin-top:7px;margin-bottom:6px;'>Search</button>-->
<!--                                <button type="button" class="btn btn-success" style="margin-top:7px;margin-bottom:6px;" onclick="resetForm()">Clear Search</button>-->

                                <?php echo $this->Form->end();?>
                            </div>
                        </div>
                    </div>
                    <div id="collapseOne" class="accordion-body collapse in body">
                        <div class="col-sm-12">
                            <div class="row">                               
                                <div class="form-group"> 
                                    <div class="col-lg-12">
                                        <div class="table-responsive">
                                            <table cellpadding="0" cellspacing="0" class="table table-striped table-bordered table-hover">
                                               <thead>
                                                   <tr>
<!--                                                       <th><?php echo $this->Paginator->sort('slno') ?></th>-->
                                                       <th><?php echo $this->Paginator->sort('total user') ?></th>
                                                       
                                                       <th><?php echo $this->Paginator->sort('total services') ?></th>
                                                       <th><?php echo $this->Paginator->sort('total verified service providers') ?></th>
                                                       <th><?php echo $this->Paginator->sort('total reviews') ?></th>
                                                       <th><?php echo $this->Paginator->sort('total visitor') ?></th>
                                                       
                                                       
                                                   </tr>
                                               </thead>
                                               <tbody id="result">
                                           
                                                   <tr>

                                                       <td><?php echo $countuser ?></td>
                                                       <td><?php echo $countservice ?></td>
                                                       <td><?php echo $countserviceverified ?></td>
                                                       <td><?php echo $countreview ?></td>
                                                       <td><?php echo $countallvisitor ?></td>
                                                         
                                                                      
                                                   </tr>
                                           
                                               </tbody>
                                           </table>
                                            
                                            <canvas id="line-chart" width="800" height="450"></canvas>
                                            
                                            
<!--                                            <div class="paginator">
                                                <ul class="pagination">
                                            <?php echo $this->Paginator->prev('< ' . __('previous')) ?>
                                            <?php echo $this->Paginator->numbers() ?>
                                            <?php echo $this->Paginator->next(__('next') . ' >') ?>
                                                </ul>
                                                <p><?php //echo $this->Paginator->counter() ?></p>
                                            </div>-->
                                        </div>  
                                    </div>
                                </div>                                
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
 
 function search(){
   
   var day=$('#day').val();
   if(day!=""){
                $.ajax({
                        url: 'statistics/getcount', 
                        cache: false,
                        data: {day:day},
                        type: 'post',
                        success: function (response) {
                          console.log(response);
                             var obj = jQuery.parseJSON( response );
                            
                             if(obj.Ack == 1){
                            
                                $('#result').html('<tr>'+
                                                       '<td>'+obj.countuser+'</td>'+
                                                       '<td>'+obj.countservice+'</td>'+
                                                       '<td>'+obj.countserviceverified+'</td>'+
                                                       '<td>'+obj.countreview+'</td>'+
                                                       '<td>'+obj.countallvisitor+'</td>'+
                                                   '</tr>');
                                
                           
new Chart(document.getElementById("line-chart"), {
  type: 'line',
    data: {
    labels: obj.months,
    datasets: [{ 
        data: obj.countusergraph,
        label: "User",
        borderColor: "#3e95cd",
        fill: false
      }, { 
        data: obj.countservicegraph,
        label: "Service",
        borderColor: "#8e5ea2",
        fill: false
      }, { 
        data: obj.countserviceverifiedgraph,
        label: "Verified Service Providers",
        borderColor: "#3cba9f",
        fill: false
      }, { 
        data: obj.countreviewgraph,
        label: "Reviews",
        borderColor: "#e8c3b9",
        fill: false
      }, { 
        data: [0,0,0,0,0,0],
        label: "Visitors",
        borderColor: "#c45850",
        fill: false
      }
    ]
  },
      
  options: {
    title: {
      display: true,
      text: 'Statistics'
    }
  }
                             
});
     
     
                             }
                        },
                        error: function (response) {
                            $('#msg').html(response);
                        }
                    });
                    }
  
        }

</script>

<!--<script>
    function search(){
   
   
   $('#search_form').submit();
   
    }
</script>-->

<script>
new Chart(document.getElementById("line-chart"), {
  type: 'line',
  data: {
    labels: ['Aug 2017','Sep 2017','Oct 2017','Nov 2017','Dec 2017','Jan 2018'],
    datasets: [{ 
        data: [0,1,0,2,1,0],
        label: "User",
        borderColor: "#3e95cd",
        fill: false
      }, { 
        data: [0,0,0,0,0,12],
        label: "Service",
        borderColor: "#8e5ea2",
        fill: false
      }, { 
        data: [0,0,0,4,1,1],
        label: "Verified Service Providers",
        borderColor: "#3cba9f",
        fill: false
      }, { 
        data: [0,0,0,0,4,0],
        label: "Reviews",
        borderColor: "#e8c3b9",
        fill: false
      }, { 
        data: [0,0,0,0,0,0],
        label: "Visitors",
        borderColor: "#c45850",
        fill: false
      }
    ]
  },
  options: {
    title: {
      display: true,
      text: 'Statistics'
    }
  }
});

</script>

<!--END PAGE CONTENT -->