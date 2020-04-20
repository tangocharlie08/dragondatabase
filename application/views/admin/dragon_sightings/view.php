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
                  <th scope="row">contact_id</th>
                  <td><?php echo $detail->contact_id; ?></td>
              </tr>
              <tr>
                  <th scope="row">Dominance</th>
                  <td><?php if($detail->dominance == 0){echo "No";}else if($detail->dominance == 1){echo "Yes";}else{echo "Unknown";} ?></td>
              </tr>
              <tr>
                  <th scope="row">Head Bob</th>
                  <td><?php if($detail->head_bob == 0){echo "No";}else if($detail->head_bob== 1){echo "Yes";}?></td>
              </tr>
              <tr>
               <th scope="row">Arm Wave</th>
               <td><?php if($detail->arm_wave == 0){echo "No";}else if($detail->arm_wave== 1){echo "Yes";}?></td>
           </tr>
           <tr>
               <th scope="row">Tail Slap</th>
               <td><?php if($detail->tail_slap == 0){echo "No";}else if($detail->tail_slap== 1){echo "Yes";}?></td>
           </tr>
           <tr>
               <th scope="row">CH</th>
               <td><?php if($detail->ch == 0){echo "No";}else if($detail->ch== 1){echo "Yes";}?></td>
           </tr>
           <tr>
               <th scope="row">Fighting</th>
               <td><?php if($detail->fighting == 0){echo "No";}else if($detail->fighting== 1){echo "Yes";}?></td>
           </tr>
           <tr>
               <th scope="row">Eating</th>
               <td><?php if($detail->eating == 0){echo "No";}else if($detail->eating== 1){echo "Yes";}?></td>
           </tr>
           <tr>
               <th scope="row">HB Fast</th>
               <td><?php if($detail->hb_fast == 0){echo "No";}else if($detail->hb_fast== 1){echo "Yes";}?></td>
           </tr>
           <tr>
               <th scope="row">HB Slow</th>
               <td><?php if($detail->hb_slow == 0){echo "No";}else if($detail->hb_slow== 1){echo "Yes";}?></td>
           </tr>
           <tr>
               <th scope="row">AW Left</th>
               <td><?php if($detail->aw_left == 0){echo "No";}else if($detail->aw_left== 1){echo "Yes";}?></td>
           </tr>
           <tr>
               <th scope="row">AW Right</th>
               <td><?php if($detail->aw_right== 0){echo "No";}else if($detail->aw_right== 1){echo "Yes";}?></td>
           </tr>
           <tr>
               <th scope="row">Fighting with contact</th>
               <td><?php if($detail->fighting_with_contact== 0){echo "No";}else if($detail->fighting_with_contact== 1){echo "Yes";}?></td>
           </tr>
           <tr>
               <th scope="row">Fighting with no contact</th>
               <td><?php if($detail->fighting_with_no_contact== 0){echo "No";}else if($detail->fighting_with_no_contact== 1){echo "Yes";}?></td>
           </tr>
           <tr>
               <th scope="row">Nesting</th>
               <td><?php if($detail->nesting== 0){echo "No";}else if($detail->nesting== 1){echo "Yes";}?></td>
           </tr>
           <tr>
               <th scope="row">Laying</th>
               <td><?php if($detail->laying== 0){echo "No";}else if($detail->laying== 1){echo "Yes";}?></td>
           </tr>
           <tr>
               <th scope="row">Tasting</th>
               <td><?php if($detail->tasting== 0){echo "No";}else if($detail->tasting== 1){echo "Yes";}?></td>
           </tr>
           <tr>
               <th scope="row">Resting</th>
               <td><?php if($detail->resting== 0){echo "No";}else if($detail->resting== 1){echo "Yes";}?></td>
           </tr>
           <tr>
               <th scope="row">Dew Lap</th>
               <td><?php if($detail->dew_lap== 0){echo "No";}else if($detail->dew_lap== 1){echo "Yes";}?></td>
           </tr>
            <!-- <tr>
             <th scope="row">Created</th>
             <td><?php //echo $detail->created;  ?></td>
         </tr> -->
         
         
         
     </tbody>
 </table>


</section>
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
