<!-- Default info blocks -->




<form  id="product_form" method="post"  role="form" enctype="multipart/form-data" action="<?php echo admin_url('dragon_management/filter') ?>"> 
    <div class="panel panel-default"> 
        <div class="panel-heading">
            <h6 class="panel-title"><i class="icon-user"></i>
               Query Dragon
            </h6>

            <h6 class="panel-title pull-right">
                
                <a style="display: block;"  id='icon_minus' data-original-title="Open Query Form" onclick="open_close(0)">
                    <i class="icon-minus"></i>                
                </a> 
                <style>
                    .icon_plus svg{
                        font-size: 34px !important; 
                    }
                </style>
                <a style="display: none;" id='icon_plus' data-original-title="Close Query Form" onclick="open_close(1)">
                    <i class="fa fa-caret-down" aria-hidden="true"></i>                
                </a>                                    
            </h6>
        </div> 
        <div class="panel-body hiding-panel ">

            <div class="form-group">
                <div class="row" style="margin-top: 15px;">
                    <div class="col-md-12">
                        <label>Search by name:</label> 
                        <input id="name" type="text" value="<?php 
                        if(!empty($this->session->userdata('search')))
                        {echo $this->session->userdata('search');} 
                        ?>" name="search" class="form-control" placeholder="Search (Leave empty if you dont want specific dragon)"/>
                    </div>
                </div>



             
                <div class="row" style="margin-top: 15px;">
                   
                    <div class="col-md-12">
                        <label>No of contacts:</label> 
                        <select id="no_of_contacts" class="manufacture-dropdown" name="no_of_contacts" >
                                <option value="" selected disabled >Select no. of contacts (Default all)</option>

                                <option <?php if(!empty($this->session->userdata('no_of_contacts'))){
                                    if($this->session->userdata('no_of_contacts') == 0){
                                        echo "selected";
                                    }else{
                                        echo "";
                                    }
                                } ?> value="0" >All</option>

                                <option <?php if(!empty($this->session->userdata('no_of_contacts'))){
                                    if($this->session->userdata('no_of_contacts') == 1){
                                        echo "selected";
                                    }else{
                                        echo "";
                                    }
                                } ?> value="1" >Below 10</option>

                                <option <?php if(!empty($this->session->userdata('no_of_contacts'))){
                                    if($this->session->userdata('no_of_contacts') == 10){
                                        echo "selected";
                                    }
                                } ?> value="10" >Between 10 to 20</option>
                                <option <?php if(!empty($this->session->userdata('no_of_contacts'))){
                                    if($this->session->userdata('no_of_contacts') == 20){
                                        echo "selected";
                                    }
                                } ?> value="20" >More than 20</option>

                        </select>
                    </div>
                </div>

                <div class="row" style="margin-top: 15px;">
                    <div class="col-md-12">
                        <label>Diseased:</label> 
                        <select id="contacts" class="manufacture-dropdown" name="diseased" >
                                <option value="" selected disabled >Select Yes or No</option>
                                <option <?php if(!empty($this->session->userdata('diseased'))){
                                    if($this->session->userdata('diseased') == 0){
                                        echo "selected";
                                    }
                                } ?> value="0" >No</option>
                                <option <?php if(!empty($this->session->userdata('diseased'))){
                                    if($this->session->userdata('diseased') == 1){
                                        echo "selected";
                                    }
                                } ?> value="1" >Yes</option>
                        </select>
                    </div>
                </div>

                <div class="row" style="margin-top: 15px;">
                    <div class="col-md-12">
                        <label>Gravid:</label> 
                        <select id="contacts" class="manufacture-dropdown" name="gravid" >
                                <option value="" selected disabled >Select Yes or No</option>
                                <option <?php if(!empty($this->session->userdata('gravid'))){
                                    if($this->session->userdata('gravid') == 0){
                                        echo "selected";
                                    }
                                } ?> value="0" >No</option>
                                <option <?php if(!empty($this->session->userdata('gravid'))){
                                    if($this->session->userdata('gravid') == 1){
                                        echo "selected";
                                    }
                                } ?> value="1" >Yes</option>
                        </select>
                    </div>
                </div>

                <div class="row" style="margin-top: 15px;">
                    <div class="col-md-12">
                        <label>Sort By:</label> 
                        <select id="sort_by" class="manufacture-dropdown" name="sort_by" >
                                <option value="" selected disabled >Select Sort by</option>
                                <option <?php if(!empty($this->session->userdata('sort_by'))){
                                    if($this->session->userdata('sort_by') == 0){
                                        echo "selected";
                                    }
                                } ?> value="0" >ID</option>
                                <option <?php if(!empty($this->session->userdata('sort_by'))){
                                    if($this->session->userdata('sort_by') == 1){
                                        echo "selected";
                                    }
                                } ?> value="1" >Name</option>
                        </select>
                    </div>
                </div>

               


            </div> 


            <div class="form-actions text-right"> 
                <input name="submitForm" type="submit" value="Cancel" class="btn btn-danger form-buttons"> 
                <input name="submitForm" id="submit" type="submit" value="Search" class="btn btn-primary form-buttons"> 
                <!-- <input name="submitForm" type="submit" value="Cancel" class="btn btn-danger">  -->
                <!-- <a href="" class="btn btn-success">Back</a>
                <a onclick="return validate_form()" href="#" class="btn btn-primary">Next</a> -->

            </div> 
        </div>

    </div>

</form>

<?php if(isset($dragons)){ ?>
    <div class="panel panel-default">
    <div class="panel-heading">
        <h6 class="panel-title">Search Results</h6>
        <h6 class="panel-title pull-right">

            <a style="display: block;"  id='download' data-original-title="Download Results" onclick="downloadResults()">
                <i class="icon-download"></i>                
            </a> 
        </h6>
        
    </div> 
    <div class="table-responsive"> 
        <table class="table table-striped table-bordered"> 
            <thead> 
                <tr>
                    <th>ID</th> 
                    <th>Dragon Name</th>
                    <th>Total Contacts</th>
                    <!-- <th>Survey Date</th> -->
                    <!-- <th>Time</th> -->

                    <th>Gender</th>
                    <th>Original ID By</th>
                    <th>Age</th> 
                    <th>General Location</th> 
                    <th>Notes</th>
                    <th>DNA</th>
                    <th>Diseased</th>
                    <th>Gravid</th>
                    <th>Total Catches</th>
                    <!-- <th>Date Geonotypd</th> -->
                    <!-- <th>Date DNA Taken</th> -->
                    <!-- <th>Date Tagged</th> -->
                    <th>First Sighted with disease</th>
                    <th>First Sighted with gravid</th>

                </tr> 
            </thead> 
            <tbody>

                <?php foreach ($dragons as $o) { ?>
                    <tr> 
                     
                        <td><?= $o->id ?></td> 
                        <td><?= $o->name ?></td>   
                        <td><?= $o->total_contacts ?></td>
                        <!-- <td><?= $o->survey_date ?></td>                    -->
                        <!-- <td><?= $o->time ?></td>                    -->

                        <td><?php if($o->gender == 0){echo "Female";}else if($o->gender == 1){echo "Male";}else{echo "Unknown";} ?></td> 
                        <?php $original_id_by = $this->db->get_where('admin', array('id'=>$o->original_id_by))->row(); ?>                    
                        <td><?php if(!empty($original_id_by)){echo $original_id_by->name;} ?> </td>
                        <td><?php if($o->gender == 0){echo "Adult";}else{echo "Juvenile";} ?> </td>
                        <?php $location = $this->db->get_where('tbl_location_dragon', array('id'=>$o->general_location))->row(); ?>
                        <td><?php if(!empty($location)){echo $location->location;} ?> </td>
                        <td><?= $o->notes; ?> </td>

                        <?php if(!empty($o->dna)){ ?>
                            <td><?= $o->dna; ?> </td>
                        <?php }else{ ?>
                            <a href=""><td>Add DNA</td></a>
                        <?php } ?>
                        <td><?php
                            if($o->diseased == 0){
                                echo 'No';
                            }else{
                                echo 'Yes';
                            }

                         ?></td>
                        <td>
                            <?php
                            if($o->gravid == 0){
                                echo 'No';
                            }else{
                                echo 'Yes';
                            }

                         ?>

                        </td>
                        <td><?php echo $o->total_catches; ?></td>

                        <!-- <td><?php //if($o->date_extracted == NULL){echo "Unknown";}else{echo$o->date_extracted; } ?> </td> -->
                        <!-- <td><?php //if($o->date_genotyped == NULL){echo "Unknown";}else{echo $o->date_genotyped; } ?> </td>
                        <td><?php //if($o->date_dna_taken == NULL){echo "Unknown";}else{echo $o->date_dna_taken; } ?> </td>
                        <td><?php //if($o->date_tagged == NULL){echo "Unknown";}else{echo $o->date_tagged; } ?> </td>  -->   
                        <td><?= $o->date_diseased_sighted; ?> </td>
                        <td><?= $o->date_gravid_sighted; ?> </td>

                        
                        </tr> 
                        <?php }?>
            </tbody> 
        </table> 
    </div> 
</div>

<div class="datatable-footer" style="margin-bottom: 10px; ">
    <div class="dataTables_info" id="DataTables_Table_1_info">
    </div>

    <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate">
        <div class="paginate">
            <?php echo $this->pagination->create_links(); ?>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('.hiding-panel').hide();
    $('#icon_minus').hide();
    $('#icon_plus').show();

</script>

<?php } ?>


<style>

    .paginate strong{
        background-color: #32434D;
        color: #FFFFFF;
        outline: 0 none;
        font-size: 12px;
        font-weight: 600;
        margin-left: 1px;
        padding: 5px 10px;
        border-radius: 2px;
    }

    .paginate a{
        color: #505050;
        outline: 0 none;
        font-size: 12px;
        font-weight: 600;
        margin-left: 1px;
        padding: 5px 10px;
        border-radius: 2px;
    }
    .paginate a:hover{
        background-color: #65B688;
        color: #ffffff;
        outline: 0 none;
        font-size: 12px;
        font-weight: 600;
        margin-left: 1px;
        padding: 5px 10px;
        border-radius: 2px;
    }

</style>
<script type="text/javascript">
    function open_close(status){
        if(status == 1){
            $('#icon_minus').show();
            $('#icon_plus').hide();
            $('.hiding-panel').show();

        }else{
            $('#icon_minus').hide();
            $('#icon_plus').show();
            $('.hiding-panel').hide();
        }
    }

    function downloadResults(){
        // alert(1);
        $('#product_form').append('<input type="hidden" value="0" name="download">');
        $("#submit").click();
        // $('#product_form').submit();
    }

</script>

