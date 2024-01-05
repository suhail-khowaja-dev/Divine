<?
$class = $this->router->fetch_class();
$method = $this->router->fetch_method();
?>
<div class="sidebar col-md-3 col-sm-3 myaccount-sidebar">
    <ul class="list-group margin-bottom-25 sidebar-menu">
        <li class="list-group-item clearfix <?=($method=='index' && $class=="account")?'active':''?>"><a href="<?=($method=='index'  && $class=="account")?'javascript:void(0)':g('base_url').'account'?>"><i
            class="fa fa-angle-right"></i> Dashboard</a></li>

            <li class="list-group-item clearfix <?=($method=='info'  && $class=="account")?'active':''?>">
                <a href="<?=($method=='info'  && $class=="account")?'javascript:void(0)':g('base_url').'account/info'?>"><i class="fa fa-angle-right"></i> My Account
                Info</a></li>
                <?php if($this->user_type=='1'){?>
                    <!-- <li class="list-group-item clearfix <?=($method=='sale'  && $class=="account")?'active':''?>">
                        <a href="<?=($method=='sale'  && $class=="account")?'javascript:void(0)':g('base_url').'account/sale'?>"><i class="fa fa-angle-right"></i> Add Sales</a></li>  -->

                        <li class="list-group-item clearfix <?=($method=='saleregistration'  && $class=="account")?'active':''?>">
                            <a href="<?=($method=='saleregistration'  && $class=="account")?'javascript:void(0)':g('base_url').'account/saleregistration'?>"><i class="fa fa-angle-right"></i> Register for a Sale</a></li>

                            <li class="list-group-item clearfix <?=($method=='saleregistered'  && $class=="account")?'active':''?>">
                                <a href="<?=($method=='saleregistered'  && $class=="account")?'javascript:void(0)':g('base_url').'account/saleregistered'?>"><i class="fa fa-angle-right"></i> View My Registration</a></li>
                                <li class="list-group-item clearfix <?=($method=='registeredshifts'  && $class=="account")?'active':''?>">
                                    <a href="<?=($method=='registeredshifts'  && $class=="account")?'javascript:void(0)':g('base_url').'account/registeredshifts'?>"><i class="fa fa-angle-right"></i>View My Volunteer Shifts</a></li>
                                <?php } 

                                elseif($this->user_type == '2'){?>
                                    <li class="list-group-item clearfix <?=($method=='volunteerregisterd'  && $class=="account")?'active':''?>">
                                        <a href="<?=($method=='volunteerregisterd'  && $class=="account")?'javascript:void(0)':g('base_url').'account/volunteerregisterd'?>"><i class="fa fa-angle-right"></i> Register for a Sale</a></li>

                                        <li class="list-group-item clearfix <?=($method=='volunteerdetail'  && $class=="account")?'active':''?>">
                                            <a href="<?=($method=='volunteerdetail'  && $class=="account")?'javascript:void(0)':g('base_url').'account/volunteerdetail'?>"><i class="fa fa-angle-right"></i>View My Volunteer Shifts</a></li>
                                        <?php } ?>

                                        <?php
        // Buyer
                                        if($this->user_type=='1'){?>
         <!--    <li class="list-group-item clearfix <?=($method=='orderhistory'  && $class=="account")?'active':''?>">
            <a href="<?=($method=='orderhistory'  && $class=="account")?'javascript:void(0)':g('base_url').'account/orderhistory'?>"><i class="fa fa-angle-right"></i> Order History</a></li> -->
        <?php }
        // Seller
        else{?>
          <!--   <li class="list-group-item clearfix <?=($method=='product'  && $class=="account")?'active':''?>">
            <a href="<?=($method=='product'  && $class=="account")?'javascript:void(0)':g('base_url').'seller_dashboard/product'?>"><i class="fa fa-angle-right"></i> My Products</a></li> -->
        <?php }
        ?>
        <li class="list-group-item clearfix <?=($method=='change_password'  && $class=="account")?'active':''?>"><a href="<?=($method=='change_password' && $class=="account")?'javascript:void(0)':g('base_url').'account/change-password'?>"><i
            class="fa fa-angle-right"></i> Change Password</a></li>
            <li class="list-group-item clearfix"><a href="<?= g('base_url') ?>user/logout"><i class="fa fa-angle-right"></i>
            Logout</a></li>
        </ul>
    </div>