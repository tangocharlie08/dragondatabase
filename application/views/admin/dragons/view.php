<aside class="right-side">                
    <!-- Content Header (Page header) -->
   <?php if ($this->session->flashdata('message')) { ?>
        <div class="breadcrumb-line">
            <p class="breadcrumb" style="color: green; font-weight: bold;">
                <?php echo $this->session->flashdata('message'); ?>
            </p>
        </div>
    <?php } ?>

    <!-- Main content -->
    <section class="content">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">Attributes</th>
                <th scope="col">Value</th>
              
              
            </tr>
            </thead>
            <tbody>
            <tr>
              <th scope="row">Id</th>
              <td><?php echo $detail->id; ?></td>
            </tr>
            <tr>
              <th scope="row">Name</th>
              <td><?php echo $detail->name; ?></td>
            </tr>
            <tr>
              <th scope="row">Gender</th>
              <td><?php if($detail->gender == 0){echo "Female";}else if($detail->gender == 1){echo "Male";}else{echo "Unknown";} ?></td>
            </tr>
            <tr>
              <th scope="row">Original ID By</th>
              <td><?php echo $detail->original_id_by_name; ?></td>
            </tr>
            <tr>
              <th scope="row">DNA</th>
              <td><?php if(empty($detail->dna)){echo "DNA not available yet.";}else{echo $detail->dna;} ?></td>
            </tr>
            <tr>
              <th scope="row">Age</th>
              <td><?php if($detail->age == 0){echo "Juvenile";}else{echo "Adult";} ?></td>
            </tr>
            <tr>
            <?php $location = $this->db->get_where('tbl_location_dragon', array('id'=>$detail->general_location))->row(); ?>
              <th scope="row">General Location</th>
              <td><?php if(!empty($location)){ echo $location->location; }
               ?>
                   
               </td>
            </tr>
            <tr>
              <th scope="row">Sub Location</th>
              <td><?php echo $detail->sub_location; ?></td>
            </tr>
            <tr>
              <th scope="row">Pit Tag</th>
              <td><?php echo $detail->pit_tag; ?></td>
            </tr>
            <tr>
              <th scope="row">Date Extracted</th>
              <td><?php 
            if(empty($detail->date_extracted)){
                echo "This dragon has not been extracted yet.";
            }else{
                echo $detail->date_extracted;
            }
            ?></td>
            </tr>
            <tr>
              <th scope="row">Date Genotyped</th>
              <td><?php 
            if(empty($detail->date_genotyped)){
                echo "This dragon has not been genotyped yet.";
            }else{
                echo $detail->date_genotyped;
            }
            ?></td>
            </tr>
            <tr>
              <th scope="row">Date DNA Taken</th>
              <td><?php 
            if(empty($detail->date_dna_taken)){
                echo "This DNA has not been taken yet.";
            }else{
                echo $detail->date_dna_taken;
            }
            ?></td>
            </tr>

            <tr>
              <th scope="row">Date Tagged</th>
              <td><?php 
            if(empty($detail->date_tagged)){
                echo "This Tag has not been added yet.";
            }else{
                echo $detail->date_tagged;
            }
            ?></td>
            </tr>

            <!-- <tr>
              <th scope="row">Created</th>
              <td><?php //echo $detail->created; ?></td>
            </tr>
            <tr>
              <th scope="row">Status</th>
              <td><?php //echo $detail->status; ?></td>
            </tr> -->
           
            </tbody>
        </table>


    </section><!-- /.content -->

    <div class="row" style="padding: 20px; margin: 0px; margin-top: -30px;">

    </div>

    <div class="panel panel-default"> 
    <div class="panel-heading">
        <h6 class="panel-title"><i class="icon-user"></i>Dragon Contacts</h6>
        <h6 class="panel-title pull-right">
<a href="<?php echo admin_url('dragon_contacts_management/add/'.$detail->id) ?>">
                <i class="icon-plus"></i>               
            </a>                                
        </h6>
    </div> 
    <div class="table-responsive"> 
        <table class="table table-striped table-bordered"> 
            <thead> 
                <tr> 
                    <th>ID</th>
                    <th>Dragon Name</th> 
                    <th>Survey Date</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                    <th>Sub Location</th>
                    <th>Notes</th>
                    <th>Contact Type</th>
                    <th>Habitat Type</th>
                    <th>Field Recorded By</th>
                    <th>Data Entry By</th>
                    <th>Diseased</th>
                    <th>Grivid</th>
                    <th>Created</th>
                    <th>Action</th>
                </tr> 
            </thead> 
            <tbody>
                <?php
                if (count($contacts) != 0) {
                    foreach ($contacts as $d) {
                        ?>
                        <tr> 
                            <td><?php echo $d->id ?></td>                    
                            <td><?php echo $d->dragon_name; ?></td>         
                            <td><?php echo $d->survey_date; ?></td> 
                            <td><?php echo $d->lat; ?></td>                 
                            <td><?php echo $d->lon; ?></td> 
                            <td><?php echo $d->sub_location; ?></td>                   
                            <td><?php echo $d->notes; ?></td>
                            <td><?php if($d->contact_type == 1){echo "Catching";}else{echo "Sighting";} ?></td><?php $habitat = $this->db->get_where('tbl_habitat_type', array('id'=>$d->habitat_type))->row(); ?>         
                            <td><?php if(!empty($habitat_type)){echo $habitat_type->type;} ?></td>

<?php $field_record = $this->db->get_where('admin', array('id'=>$d->field_record_by))->row(); ?>

                            <td><?php if(!empty($field_record)){echo $field_record->name;} ?></td>
                            <?php $data_entry = $this->db->get_where('admin', array('id'=>$d->data_entry_by))->row(); ?> 
                            <td><?php if(!empty($data_entry)){echo $data_entry->name;} ?></td>
                            <td><?php if($d->diseased == 1){echo "Yes";}else{echo "No";} ?></td>
                            <td><?php if($d->gravid == 1){echo "Yes";}else{echo "No";} ?></td>
                            <td><?php echo $d->created; ?></td>                     
                                                 
                            <td> 
                                <a class="btn btn-default btn-icon btn-xs tip" href="<?php echo admin_url('dragon_contacts_management/view/' . $d->id) ?>"><i class="icon-eye"></i></a> 

                                <a data-original-title="Edit" href="<?php echo admin_url('dragon_contacts_management/edit/' . $d->id .'/'. $d->dragon_id); ?>" class="btn btn-default btn-icon btn-xs tip" title="">
                                    <i class="icon-pencil"></i>
                                </a> 
        <!--                                <a onclick="return confirm('Are you sure you want to Delete App ?')" data-original-title="Delete" href="<?php //echo admin_url('content_management/delete/' . $d->id);                    ?>" class="btn btn-default btn-icon btn-xs tip" title="">
                                    <i class="icon-remove3"></i>
                                </a> -->

                            </td> 
                        </tr>

                        <?php
                    }
                } else {
                    echo '<tr><td colspan="10">No Result Found</td></tr>';
                }
                ?>
            </tbody> 
        </table> 
    </div> 
</div>
<div class="datatable-footer" style="margin-bottom: 10px; ">
    <div class="dataTables_info" id="DataTables_Table_1_info">
        Showing <?php //echo count($detail) ?> out of <?php //echo $count ?> entries
    </div>

    <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate">
        <div class="paginate">
            <?php //echo $this->pagination->create_links(); ?>
        </div>
    </div>
</div>



</aside>
