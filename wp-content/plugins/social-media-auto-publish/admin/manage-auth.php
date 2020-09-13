<?php if( !defined('ABSPATH') ){ exit();}
global $wpdb;
if(isset($_GET['msg']) && $_GET['msg']=='smap_pack_updated'){
	?>
<div class="system_notice_area_style1" id="system_notice_area">
SMAP Package updated successfully.&nbsp;&nbsp;&nbsp;<span id="system_notice_area_dismiss">Dismiss</span>
</div>
<?php
}
$free_plugin_source='smap';$xyz_smap_licence_key='';
$domain_name=trim(get_option('siteurl'));
$xyzscripts_hash_val=trim(get_option('xyz_smap_xyzscripts_hash_val'));
$xyzscripts_user_id=trim(get_option('xyz_smap_xyzscripts_user_id'));
$manage_auth_parameters=array(
		'xyzscripts_user_id'=>$xyzscripts_user_id,
		'free_plugin_source'=>$free_plugin_source
);
if ($xyzscripts_user_id=='')
{
	echo '<b>Please  authorize smapsolutions app under Facebook/LinkedIn settings to access this page.</b>';
	return;
}
?>
<style type="text/css">
.widefat {border: 1px solid #eeeeee!important;
margin: 0px !important;
border-bottom: 3px solid #00a0d2 !important;
margin-bottom:5px;}

.widefat th {border:1px solid #ffffff !important; background-color:#00a0d2; color:#ffffff; margin:0px !important;  padding-top: 12px;
padding-bottom: 12px;
text-align: left;}

.widefat td, .widefat th {
color:#2f2f2f ;
	padding: 12px 5px;
	margin: 0px;
}

.widefat tr{ border: 1px solid #ddd;}

.widefat tr:nth-child(even){background-color: #dddddd !important;}

.widefat tr:hover {background-color: #cccccc;}


.delete_auth_entry,.delete_ln_auth_entry,.delete_inactive_fb_entry,.delete_inactive_ln_entry{background-color: #00a0d2;
border: none;
padding: 5px 10px;
color: #fff;
border-radius: 2px;
outline:0;
}

.delete_auth_entry:hover,.delete_ln_auth_entry:hover{background-color:#008282;}

.select_box
{
display: block;
padding: 10px;
background-color: #ddd;
color: #2f2f2f;
width: 96.8%;
margin-bottom: 1px;
}
.xyz_smap_plan_div{
float:left;
padding-left: 5px;
background-color:#b7b6b6;
border-radius:3px;
padding: 5px;
color: white;
margin-left: 5px;
}
.xyz_smap_plan_label{
	font-size: 15px;
    color: #ffffff;
    font-weight: 500;
    float: left;
    padding: 5px;
    background-color: #30a0d2;
}
</style>
<script type="text/javascript">
jQuery(document).ready(function() {
	document.getElementById("xyz_smap_default_fbauth_tab").click();	
	jQuery('#auth_entries_div').show();
	jQuery("#show_all").attr('checked', true);

	jQuery("#show_all").click(function(){
		jQuery('#smap_manage_auth_table tr:has(td.diff_domain)').show();
		jQuery('#smap_manage_auth_table tr:has(td.same_domain)').show();
	});
	jQuery("#show_same_domain").click(function(){
		jQuery('#smap_manage_auth_table tr:has(td.diff_domain)').hide();
		jQuery('#smap_manage_auth_table tr:has(td.same_domain)').show();
	});
	jQuery("#show_diff_domain").click(function(){
		jQuery('#smap_manage_auth_table tr:has(td.diff_domain)').show();
		jQuery('#smap_manage_auth_table tr:has(td.same_domain)').hide();
	});

	jQuery(".delete_auth_entry").off('click').on('click', function() {
	    var auth_id=jQuery(this).attr("data-id");
	    jQuery("#show-del-icon_"+auth_id).hide();
	    jQuery("#ajax-save_"+auth_id).show();
	    var xyzscripts_user_hash=jQuery(this).attr("data-xyzscripts_hash");
	    var plugin_src=jQuery(this).attr("data-plugin-src");
	    var xyzscripts_id=jQuery(this).attr("data-xyzscriptsid");
		var account_id =jQuery(this).attr("data-account_id");
	    var xyz_smap_del_entries_nonce= '<?php echo wp_create_nonce('xyz_smap_del_entries_nonce');?>';
	    var dataString = {
	    	action: 'xyz_smap_del_entries',
	    	auth_id: auth_id ,
	    	xyzscripts_id: xyzscripts_id,
	    	xyzscripts_user_hash: xyzscripts_user_hash,
	    	plugin_src:plugin_src,
	    	dataType: 'json',
	    	_wpnonce: xyz_smap_del_entries_nonce
	    };
	    jQuery.post(ajaxurl, dataString ,function(data) {
	    	jQuery("#ajax-save_"+auth_id).hide();
	    	 if(data==1)
			       	alert("You do not have sufficient permissions");
			else{
	    	var data=jQuery.parseJSON(data);
	    	if(data.status==1){
	    		jQuery(".tr_"+auth_id).remove();

	    		if(jQuery('#system_notice_area').length==0)
	    			jQuery('body').append('<div class="system_notice_area_style1" id="system_notice_area"></div>');
	    			jQuery("#system_notice_area").html('Account details successfully deleted from SMAPSolutions&nbsp;&nbsp;&nbsp; <span id="system_notice_area_dismiss">Dismiss</span>');
	    			jQuery("#system_notice_area").show();
	    			jQuery('#system_notice_area_dismiss').click(function() {
	    				jQuery('#system_notice_area').animate({
	    					opacity : 'hide',
	    					height : 'hide'
	    				}, 500);
	    			});

	    	}
	    	else if(data.status==0 )
	    	{
	    		jQuery("#show_err_"+auth_id).append(data.msg );
	    	}
	    }
	    });
				});
/////////////////////////////////LinkedIn Ajax//////////////////////////////////////////////
	jQuery('#ln_auth_entries_div').show();
	jQuery("#ln_show_all").attr('checked', true);

	jQuery("#ln_show_all").click(function(){
		jQuery('#ln_smap_manage_auth_table tr:has(td.ln_diff_domain)').show();
		jQuery('#ln_smap_manage_auth_table tr:has(td.ln_same_domain)').show();
	});
		jQuery("#ln_show_same_domain").click(function(){
			jQuery('#ln_smap_manage_auth_table tr:has(td.ln_diff_domain)').hide();
			jQuery('#ln_smap_manage_auth_table tr:has(td.ln_same_domain)').show();
		});
			jQuery("#ln_show_diff_domain").click(function(){
				jQuery('#ln_smap_manage_auth_table tr:has(td.ln_diff_domain)').show();
				jQuery('#ln_smap_manage_auth_table tr:has(td.ln_same_domain)').hide();
			});
				jQuery(".delete_ln_auth_entry").off('click').on('click', function() {
	    var ln_auth_id=jQuery(this).attr("data-auth_id");
	    var plugin_src=jQuery(this).attr("data-plugin-src");
	    jQuery("#show-del-icon_"+ln_auth_id).hide();
	    jQuery("#ajax-save_"+ln_auth_id).show();
	    var xyzscripts_user_hash=jQuery(this).attr("data-xyzscripts_hash");
	    var xyzscripts_id=jQuery(this).attr("data-xyzscriptsid");
		var account_id =jQuery(this).attr("data-ln_account_id");
	    var xyz_smap_del_entries_ln_nonce= '<?php echo wp_create_nonce('xyz_smap_del_entries_ln_nonce');?>';
	    var dataString = {
	    	action: 'xyz_smap_del_ln_entries',
	    	ln_auth_id: ln_auth_id ,
	    	account_id: account_id,
	    	xyzscripts_id: xyzscripts_id,
	    	plugin_src:plugin_src,
	    	xyzscripts_user_hash: xyzscripts_user_hash,
	    	dataType: 'json',
	    	_wpnonce: xyz_smap_del_entries_ln_nonce
	    };
	    jQuery.post(ajaxurl, dataString ,function(data) {
	    	jQuery("#ajax-save_"+ln_auth_id).hide();
	    	 if(data==1)
			       	alert("You do not have sufficient permissions");
			else{
	    	var data=jQuery.parseJSON(data);
	    	if(data.status==1){
	    		jQuery(".tr_"+ln_auth_id).remove();
	    		if(jQuery('#system_notice_area').length==0)
	    			jQuery('body').append('<div class="system_notice_area_style1" id="system_notice_area"></div>');
	    			jQuery("#system_notice_area").html('Account details successfully deleted from SMAPSolutions&nbsp;&nbsp;&nbsp; <span id="system_notice_area_dismiss">Dismiss</span>');
	    			jQuery("#system_notice_area").show();
	    			jQuery('#system_notice_area_dismiss').click(function() {
	    				jQuery('#system_notice_area').animate({
	    					opacity : 'hide',
	    					height : 'hide'
	    				}, 500);
	    			});
	    	}
	    	else if(data.status==0 )
	    	{
	    		jQuery("#show_err_"+ln_auth_id).append(data.msg );
	    	}
	    }
	    });
	});
/////////////////////////////////LinkedIn Ajax//////////////////////////////////////////////				
jQuery("input[name='domain_selection']").click(function(){//show_diff_domain
	numOfVisibleRows = jQuery('#smap_manage_auth_table tr:visible').length;
	//if (this.id == 'show_diff_domain') 
	//	{
		if(numOfVisibleRows==1)
		{	
			jQuery('.xyz_smap_manage_auth_th_fb').hide();
			jQuery('#xyz_smap_no_auth_entries').show();
		}
		else{	
			jQuery('.xyz_smap_manage_auth_th_fb').show();
			jQuery('#xyz_smap_no_auth_entries').hide();
		}
//	}
});		
jQuery("input[name='ln_domain_selection']").click(function(){//show_diff_domain
	numOfVisibleLnRows = jQuery('#ln_smap_manage_auth_table tr:visible').length;
	//if (this.id == 'show_diff_domain') 
	//	{
		if(numOfVisibleLnRows==1)
		{	
			jQuery('.xyz_smap_manage_auth_th_ln').hide();
			jQuery('#xyz_smap_no_auth_entries_ln').show();
		}
		else{	
			jQuery('.xyz_smap_manage_auth_th_ln').show();
			jQuery('#xyz_smap_no_auth_entries_ln').hide();
		}
//	}
});	
///////////////////////DELETE INACTIVE FB ACC//////////////////////////////
jQuery(".delete_inactive_fb_entry").off('click').on('click', function() {
    var fb_userid=jQuery(this).attr("data-fbid");
    var tr_iterationid=jQuery(this).attr("data-iterationid");
    jQuery("#show-del-icon-inactive-fb_"+tr_iterationid).hide();
    jQuery("#ajax-save-inactive-fb_"+tr_iterationid).show();
    var xyzscripts_user_hash=jQuery(this).attr("data-xyzscripts_hash");
    var xyzscripts_id=jQuery(this).attr("data-xyzscriptsid");
    var xyz_smap_del_fb_entries_nonce= '<?php echo wp_create_nonce('xyz_smap_del_fb_entries_nonce');?>';
    var dataString = {
    	action: 'xyz_smap_del_fb_entries',
    	tr_iterationid: tr_iterationid ,
    	xyzscripts_id: xyzscripts_id,
    	xyzscripts_user_hash: xyzscripts_user_hash,
    	fb_userid: fb_userid,
    	dataType: 'json',
    	_wpnonce: xyz_smap_del_fb_entries_nonce
    };
    jQuery.post(ajaxurl, dataString ,function(data) {
    	jQuery("#ajax-save-inactive-fb_"+tr_iterationid).hide();
    	 if(data==1)
		       	alert("You do not have sufficient permissions");
		else{
    	var data=jQuery.parseJSON(data);
    	if(data.status==1){
    		jQuery(".tr_inactive"+tr_iterationid).remove();
    		if(jQuery('#system_notice_area').length==0)
    			jQuery('body').append('<div class="system_notice_area_style1" id="system_notice_area"></div>');
    			jQuery("#system_notice_area").html('In-active Facebook account successfully deleted from SMAPSolutions&nbsp;&nbsp;&nbsp; <span id="system_notice_area_dismiss">Dismiss</span>');
    			jQuery("#system_notice_area").show();
    			jQuery('#system_notice_area_dismiss').click(function() {
    				jQuery('#system_notice_area').animate({
    					opacity : 'hide',
    					height : 'hide'
    				}, 500);
    			});
    	}
    	else if(data.status==0 )
    	{
    		jQuery("#show_err_inactive_fb_"+tr_iterationid).append(data.msg );
    	}
    }
				});
  });
//////////////////////////////DELETE INACTIVE LN ACCOUNT///////////
jQuery(".delete_inactive_ln_entry").off('click').on('click', function() {
    var ln_userid=jQuery(this).attr("data-lnid");
    var tr_iterationid=jQuery(this).attr("data-ln_iterationid");
    jQuery("#show-del-icon-inactive-ln_"+tr_iterationid).hide();
    jQuery("#ajax-save-inactive-ln_"+tr_iterationid).show();
    var xyzscripts_user_hash=jQuery(this).attr("data-xyzscripts_hash");
    var xyzscripts_id=jQuery(this).attr("data-xyzscriptsid");
    var xyz_smap_del_lnuser_entries_nonce= '<?php echo wp_create_nonce('xyz_smap_del_lnuser_entries_nonce');?>';
    var dataString = {
    	action: 'xyz_smap_del_lnuser_entries',
    	tr_iterationid: tr_iterationid ,
    	xyzscripts_id: xyzscripts_id,
    	xyzscripts_user_hash: xyzscripts_user_hash,
    	ln_userid: ln_userid,
    	dataType: 'json',
    	_wpnonce: xyz_smap_del_lnuser_entries_nonce
    };
    jQuery.post(ajaxurl, dataString ,function(data) {
    	jQuery("#ajax-save-inactive-ln_"+tr_iterationid).hide();
    	 if(data==1)
		       	alert("You do not have sufficient permissions");
		else{

    	var data=jQuery.parseJSON(data);
    	if(data.status==1){
    		jQuery(".tr_inactive"+tr_iterationid).remove();
    		if(jQuery('#system_notice_area').length==0)
    			jQuery('body').append('<div class="system_notice_area_style1" id="system_notice_area"></div>');
    			jQuery("#system_notice_area").html('In-active LinkedIn account successfully deleted from SMAPSolutions&nbsp;&nbsp;&nbsp; <span id="system_notice_area_dismiss">Dismiss</span>');
    			jQuery("#system_notice_area").show();
    			jQuery('#system_notice_area_dismiss').click(function() {
    				jQuery('#system_notice_area').animate({
    					opacity : 'hide',
    					height : 'hide'
    				}, 500);
    			});
    	}
    	else if(data.status==0 )
    	{
    		jQuery("#show_err_inactive_ln_"+tr_iterationid).append(data.msg );
    	}
    }
    });
  });
///////////////////////////////////////////////////////////////////
window.addEventListener('message', function(e) {
	ProcessChildMessage_2(e.data);
} , false);
//////////////////////////////////////////////////////////////////
	function ProcessChildMessage_2(message) {
			var obj1=jQuery.parseJSON(message);//console.log(message);
		  	if(obj1.smap_api_upgrade && obj1.success_flag){ 
			   var base = '<?php echo admin_url('admin.php?page=social-media-auto-publish-manage-authorizations&msg=smap_pack_updated');?>';
			  window.location.href = base;
			}
	}
///////////////////////////////////////////////////////////////////
});
function smap_popup_purchase_plan(auth_secret_key,request_hash,media)
{
	var account_id=0;
	var xyz_smap_pre_smapsoln_userid=0;
	var childWindow = null;
	var domain_name='<?php echo urlencode($domain_name); ?>';
	var smap_licence_key='<?php echo $xyz_smap_licence_key;?>';
	var smap_solution_url='<?php echo XYZ_SMAP_SOLUTION_AUTH_URL;?>';
	var xyzscripts_hash_val	='<?php echo $xyzscripts_hash_val;?>';
	var xyzscripts_user_id='<?php echo $xyzscripts_user_id; ?>';
	var smap_plugin_source='<?php echo $free_plugin_source;?>';
if(media=='facebook')
	childWindow=window.open(smap_solution_url+"authorize/facebook.php?smap_id="+xyz_smap_pre_smapsoln_userid+"&account_id="+account_id+"&domain_name="+domain_name+"&xyzscripts_user_id="+xyzscripts_user_id+"&smap_licence_key="+smap_licence_key+"&auth_secret_key="+auth_secret_key+"&free_plugin_source="+smap_plugin_source+"&smap_api_upgrade=1&request_hash="+request_hash, "SmapSolutions Authorization", "toolbar=yes,scrollbars=yes,resizable=yes,left=500,width=600,height=600");
	else if(media=='linkedin')
		childWindow=window.open(smap_solution_url+"authorize_linkedIn/linkedin.php?smap_ln_auth_id="+xyz_smap_pre_smapsoln_userid+"&account_id="+account_id+"&domain_name="+domain_name+"&xyzscripts_user_id="+xyzscripts_user_id+"&smap_licence_key="+smap_licence_key+"&auth_secret_key="+auth_secret_key+"&free_plugin_source="+smap_plugin_source+"&smap_api_upgrade=1&request_hash="+request_hash, "SmapSolutions Authorization", "toolbar=yes,scrollbars=yes,resizable=yes,left=500,width=600,height=600");
	return false;
}
	</script>
	<div>
	<h3>Manage Authorizations</h3>
	<div class="xyz_smap_tab">
   <button class="xyz_smap_tablinks" onclick="xyz_smap_open_tab(event, 'xyz_smap_facebook_auths')" id="xyz_smap_default_fbauth_tab">Facebook Authorizations</button>

   <button class="xyz_smap_tablinks" onclick="xyz_smap_open_tab(event, 'xyz_smap_linkedin_auths')" id="xyz_smap_ln_auth_tab">LinkedIn Authorizations</button>
</div>
<div id="xyz_smap_facebook_auths" class="xyz_smap_tabcontent">
	<?php

$url=XYZ_SMAP_SOLUTION_AUTH_URL.'authorize/manage-authorizations.php';//manage-authorizations.php';
$content=xyz_smap_post_to_smap_api($manage_auth_parameters,$url,$xyzscripts_hash_val);
$result=json_decode($content,true);//print_r($result);//die;
if(!empty($result) && isset($result['status']))
{
	if($result['status']==0)
	{
	$er_msg=$result['msg'];
	echo '<div style="color:red;font-size:15px;padding:3px;">'.$er_msg.'</div>';
	//header("Location:".admin_url('admin.php?page=social-media-auto-publish-manage-authorizations-premium&msg=2&error_msg='.$er_msg));
	}
	if($result['status']==1 || isset($result['package_details'])){
		$auth_entries=$result['msg'];

	?>
		<div id="auth_entries_div" style="margin-bottom: 5px;">
							<br/>
					<?php if(!empty($result) && isset($result['package_details']))
					{
						?><div class="xyz_smap_plan_label">Current Plan:</div><?php 
						$package_details=$result['package_details'];	?>
						<div class="xyz_smap_plan_div">Allowed Facebook users: <?php echo $package_details['allowed_fb_user_accounts'];?> &nbsp;</div>
						<div  class="xyz_smap_plan_div"> API limit per account :  <?php echo $package_details['allowed_api_calls'];?> per hour&nbsp;</div>
						<div  class="xyz_smap_plan_div">Package Expiry :  <?php echo date('d/m/Y g:i a', $package_details['expiry_time']);?>  &nbsp;</div>
						<div  class="xyz_smap_plan_div">Package Status :  <?php echo $package_details['package_status'];?> &nbsp;</div>
						<?php 
// 						if ($package_details['package_status']=='Expired')
						{
							$xyz_smap_accountId=$xyz_smap_pre_smapsoln_userid=0;
							$request_hash=md5($xyzscripts_user_id.$xyzscripts_hash_val);
							$auth_secret_key=md5('smapsolutions'.$domain_name.$xyz_smap_accountId.$xyz_smap_pre_smapsoln_userid.$xyzscripts_user_id.$request_hash.$xyz_smap_licence_key.$free_plugin_source.'1');
							?>
							<div  class="xyz_smap_plan_div">
							<a href="javascript:smap_popup_purchase_plan('<?php echo $auth_secret_key;?>','<?php echo $request_hash;?>','facebook');void(0);">
							<i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;Upgrade/Renew
							</a> 
							</div>
							<?php 
						}
					}if (is_array($auth_entries) && !empty($auth_entries)){?><br/>
						<span class="select_box" style="float: left;margin-top: 16px;" >
						<input type="radio" name="domain_selection" value="0" id="show_all">Show all entries
						<input type="radio" name="domain_selection" value="1" id="show_same_domain">Show entries from current wp installation 
						<input type="radio" name="domain_selection" value="2" id="show_diff_domain" >Show entries from other wp installations
						</span>
						<table cellpadding="0" cellspacing="0" class="widefat" style="width: 99%; margin: 0 auto; border-bottom:none;" id="smap_manage_auth_table">
						<thead>
						<tr class="xyz_smap_manage_auth_th_fb">
						
						<th scope="col" width="8%">Facebook username</th>
						<th scope="col" width="10%">Selected pages</th>
						<th scope="col" width="10%">Selected groups</th>
						<th scope="col" width="10%">WP url</th>
						<th scope="col" width="10%">Plugin</th>
						<th scope="col" width="5%">Account ID (SMAP PREMIUM)</th>
						<th scope="col" width="5%">Action</th>
						</tr>
						</thead> <?php
						$i=0;
// 						print_r($auth_entries);
						foreach ($auth_entries as $auth_entries_key => $auth_entries_val)
						{
							/*if ($i==100){
							$auth_entries_val['inactive_fb_userid']=123456;
							$auth_entries_val['inactive_fb_username']='test';
							}*/
							if (isset($auth_entries_val['auth_id']))
						{
							?>
							 <tr class="tr_<?php echo $auth_entries_val['auth_id'];?>">
							 	
							 <td><?php  echo $auth_entries_val['fb_username'];?>
							 	</td>
							<?php if(isset($auth_entries_val['pages'])&& !empty($auth_entries_val['pages'])){?>
							 	<td> <?php echo $auth_entries_val['pages'];?> </td>
							 	<?php }else echo "<td> NA </td>";?>	
							 		<?php if(isset($auth_entries_val['groups'])&& !empty($auth_entries_val['groups'])){?>
							 	<td> <?php echo $auth_entries_val['groups'];?> </td>
							 	<?php }else echo "<td> NA </td>";?>
							 	<?php 	if($auth_entries_val['domain_name']==$domain_name){?>
							 	<td class='same_domain'> <?php echo $auth_entries_val['domain_name'];?> </td>
							 	<?php }
							 	else{?>
							 	<td class='diff_domain'> <?php echo $auth_entries_val['domain_name'];?> </td>
							 	<?php } ?>
							 	<td> <?php
							 	if($auth_entries_val['free_plugin_source']=='fbap')
							 		echo 'WP2SOCIAL AUTO PUBLISH';
							 		elseif ($auth_entries_val['free_plugin_source']=='smap')
							 		echo 'SOCIAL MEDIA AUTO PUBLISH';
							 		elseif ($auth_entries_val['free_plugin_source']=='pls')
							 		echo 'XYZ WP SMAP Premium Plus';
							 		else echo 'XYZ WP SMAP Premium';
							 		?></td>
							 		<td> <?php if($auth_entries_val['smap_pre_account_id']!=0)echo $auth_entries_val['smap_pre_account_id'];
							 		else echo 'Not Applicable';?> </td>
							 		<td>
							 		<?php if ($domain_name==$auth_entries_val['domain_name'] && $free_plugin_source==$auth_entries_val['free_plugin_source'] ) {
							 		?>
							 		<span id='ajax-save_<?php echo $auth_entries_val['auth_id'];?>' style="display:none;"><img	title="Deleting entry"	src="<?php echo plugins_url("images/ajax-loader.gif",XYZ_SMAP_PLUGIN_FILE);?>" style="width:20px;height:20px; "></span>
							 		<span id='show-del-icon_<?php echo $auth_entries_val['auth_id'];?>'>
							 		<input type="button" class="delete_auth_entry" data-id=<?php echo $auth_entries_val['auth_id'];?> data-plugin-src=<?php echo $auth_entries_val['free_plugin_source'];?> data-account_id=<?php echo $auth_entries_val['smap_pre_account_id'];?>  data-xyzscriptsid="<?php echo $xyzscripts_user_id;?>" data-xyzscripts_hash="<?php echo $xyzscripts_hash_val;?>" name='del_entry' value="Delete" >
							 		</span>
							 		<span id='show_err_<?php echo $auth_entries_val['auth_id'];?>' style="color:red;" ></span>
							 		<?php
							 		?></td>
							 		</tr>
							 		<?php
							 		}
						}
						else if (isset($auth_entries_val['inactive_fb_userid']))
						{
						?>
						 <tr class="tr_inactive<?php echo $i;?>">
						 <td><?php  echo $auth_entries_val['inactive_fb_username'];?><br/>(Inactive)
						 </td>
						 <td>-</td>
						 <td>-</td>
						 <td>-</td>
						 <td>-</td>
						 <td>-</td>
						 <td>
						 <span id='ajax-save-inactive-fb_<?php echo $i;?>' style="display:none;"><img	title="Deleting entry"	src="<?php echo plugins_url("images/ajax-loader.gif",XYZ_SMAP_PLUGIN_FILE);?>" style="width:20px;height:20px; "></span>
						 <span id='show-del-icon-inactive-fb_<?php echo $i;?>'>
						 <input type="button" class="delete_inactive_fb_entry" data-iterationid=<?php echo $i;?> data-fbid=<?php echo $auth_entries_val['inactive_fb_userid'];?> data-xyzscriptsid="<?php echo $xyzscripts_user_id;?>" data-xyzscripts_hash="<?php echo $xyzscripts_hash_val;?>" name='del_entry' value="Delete" >
						 </span>
						 <span id='show_err_inactive_fb_<?php echo $i;?>' style="color:red;" ></span>
						 </td>
						 </tr>
						<?php 
							$i++;
						}
							
						}///////////////foreach
					?>
					<tr id="xyz_smap_no_auth_entries" style="display: none;"><td>No Authorizations</td></tr>
					</table>
					<?php }?>
					</div><?php 
}
}
else {
	echo "<div>Unable to connect. Please check your curl and firewall settings</div>";
}
?></div>
<!-- linkedin  -->
<div id="xyz_smap_linkedin_auths" class="xyz_smap_tabcontent">
	<?php
$url_ln=XYZ_SMAP_SOLUTION_AUTH_URL.'authorize_linkedIn/manage-ln-authorizations.php';
$content_ln=xyz_smap_post_to_smap_api($manage_auth_parameters,$url_ln,$xyzscripts_hash_val);
$result_ln=json_decode($content_ln,true);//print_r($result_ln);//die;
if(!empty($result_ln) && isset($result_ln['status']))
{
	if($result_ln['status']==0)
	{
	$er_msg=$result_ln['msg'];
	echo '<div style="color:red;font-size:15px;">'.$er_msg.'</div>';
	}
	if($result_ln['status']==1 || isset($result_ln['package_details'])){
		$ln_auth_entries=$result_ln['msg'];
?>
		<div id="ln_auth_entries_div" style="margin-bottom: 5px;">
					<br/>
					<?php if(!empty($result_ln) && isset($result_ln['package_details']))
					{
						?><div class="xyz_smap_plan_label">Current Plan:</div><?php 
						$ln_package_details=$result_ln['package_details'];?>
						<div class="xyz_smap_plan_div">Allowed LinkedIn users: <?php echo $ln_package_details['allowed_ln_user_accounts'];?> &nbsp;</div>
						<div  class="xyz_smap_plan_div"> API limit per account :  <?php echo $ln_package_details['allowed_lnapi_calls'];?> per day &nbsp;</div>
						<div  class="xyz_smap_plan_div">Package Expiry :  <?php echo date('d/m/Y g:i a', $ln_package_details['ln_expiry_time']);?>  &nbsp;</div>
						<div  class="xyz_smap_plan_div">Package Status :  <?php echo $ln_package_details['package_status'];?> &nbsp;</div>
						<?php 
// 						if ($ln_package_details['package_status']=='Expired')
						{
							$xyz_smap_accountId=$xyz_smap_pre_smapsoln_userid=0;
							$request_hash=md5($xyzscripts_user_id.$xyzscripts_hash_val);
							$auth_secret_key=md5('smapsolutions'.$domain_name.$xyz_smap_accountId.$xyz_smap_pre_smapsoln_userid.$xyzscripts_user_id.$request_hash.$xyz_smap_licence_key.$free_plugin_source.'1');
							?>
							<div  class="xyz_smap_plan_div">
							<a href="javascript:smap_popup_purchase_plan('<?php echo $auth_secret_key;?>','<?php echo $request_hash;?>','linkedin');void(0);">
							<i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;Upgrade/Renew
							</a> 
							</div>
							<?php 
						}
					}
					if (is_array($ln_auth_entries) && !empty($ln_auth_entries)){
					?><br/>
						<span class="select_box"  style="float: left;margin-top: 16px;" >
						<input type="radio" name="ln_domain_selection" value="0" id="ln_show_all">Show all entries
						<input type="radio" name="ln_domain_selection" value="1" id="ln_show_same_domain">Show entries from current wp installation 
						<input type="radio" name="ln_domain_selection" value="2" id="ln_show_diff_domain" >Show entries from other wp installations
						</span>
						<table cellpadding="0" cellspacing="0" class="widefat" style="width: 99%; margin: 0 auto; border-bottom:none;" id="ln_smap_manage_auth_table">
						<thead>
						<tr class="xyz_smap_manage_auth_th_ln">
						<th scope="col" width="13%">LinkedIn user name</th>
						<th scope="col" width="15%">Selected pages</th>
<!-- 						<th scope="col" width="10%">Selected groups</th> -->
						<th scope="col" width="10%">WP url</th>
						<th scope="col" width="10%">Plugin</th>
						<th scope="col" width="5%">Account ID (SMAP PREMIUM)</th>
						<th scope="col" width="5%">Action</th>
						</tr>
						</thead> <?php
						$i=0;
						foreach ($ln_auth_entries as $ln_auth_entries_key => $ln_auth_entries_val)
						{
// 							print_r($ln_auth_entries);
							if (isset($ln_auth_entries_val['auth_id'])){
							?>
							 <tr class="tr_<?php echo $ln_auth_entries_val['auth_id'];?>">
							 <td><?php  echo $ln_auth_entries_val['ln_username'];?>
							 	</td>
							<?php if(isset($ln_auth_entries_val['pages'])&& !empty($ln_auth_entries_val['pages'])){?>
							 	<td> <?php echo $ln_auth_entries_val['pages'];?> </td>
							 	<?php }else echo "<td> NA </td>";?>
							 	<?php 	if($ln_auth_entries_val['domain_name']==$domain_name){?>
							 	<td class='ln_same_domain'> <?php echo $ln_auth_entries_val['domain_name'];?> </td>
							 	<?php }
							 	else{?>
							 	<td class='ln_diff_domain'> <?php echo $ln_auth_entries_val['domain_name'];?> </td>
							 	<?php } ?>
							 	<td> <?php
							 	if($ln_auth_entries_val['free_plugin_source']=='lnap')
							 		echo 'WP TO LINKEDIN AUTO PUBLISH';
							 		elseif ($ln_auth_entries_val['free_plugin_source']=='smap')
							 		echo 'SOCIAL MEDIA AUTO PUBLISH';
							 		elseif ($ln_auth_entries_val['free_plugin_source']=='pls')
							 		echo 'XYZ WP SMAP Premium Plus';
							 		else echo 'XYZ WP SMAP Premium';
							 		?></td>
							 		<td> <?php if($ln_auth_entries_val['smap_pre_account_id']!=0){echo $ln_auth_entries_val['smap_pre_account_id'];}
							 		else echo 'Not Applicable';?> </td>
							 		<td>
							 		<?php
							 		if ($domain_name==$ln_auth_entries_val['domain_name'] && $free_plugin_source==$ln_auth_entries_val['free_plugin_source'] ) {
							 		?>
							 		<span id='ajax-save_<?php echo $ln_auth_entries_val['auth_id'];?>' style="display:none;"><img	title="Deleting entry"	src="<?php echo plugins_url("images/ajax-loader.gif",XYZ_SMAP_PLUGIN_FILE);?>" style="width:20px;height:20px; "/></span>
							 		<span id='show-del-icon_<?php echo $ln_auth_entries_val['auth_id'];?>'>
							 		<input type="button" class="delete_ln_auth_entry" data-auth_id=<?php echo $ln_auth_entries_val['auth_id'];?> data-ln_account_id=<?php echo $ln_auth_entries_val['smap_pre_account_id'];?>   data-plugin-src=<?php echo $ln_auth_entries_val['free_plugin_source'];?> data-xyzscriptsid="<?php echo $xyzscripts_user_id;?>" data-xyzscripts_hash="<?php echo $xyzscripts_hash_val;?>" name='del_ln_entry' value="Delete" >
							 		</span>
							 		<span id='show_err_<?php echo $ln_auth_entries_val['auth_id'];?>' style="color:red;" ></span>
							 		<?php
							 		?></td>
							 		</tr>
							 		<?php
							 		}
							}
							else if (isset($ln_auth_entries_val['inactive_ln_userid']))
							{
								?>
						 <tr class="tr_inactive<?php echo $i;?>">
						 <td><?php  echo $ln_auth_entries_val['inactive_ln_username'];?><br/>(Inactive)
						 </td>
						 <td>-</td>
						 <td>-</td>
						 <td>-</td>
						 <td>-</td>
						 <td>
						 <span id='ajax-save-inactive-ln_<?php echo $i;?>' style="display:none;"><img	title="Deleting entry"	src="<?php echo plugins_url("images/ajax-loader.gif",XYZ_SMAP_PLUGIN_FILE);?>" style="width:20px;height:20px; "></span>
						 <span id='show-del-icon-inactive-ln_<?php echo $i;?>'>
						 <input type="button" class="delete_inactive_ln_entry" data-ln_iterationid=<?php echo $i;?> data-lnid=<?php echo $ln_auth_entries_val['inactive_ln_userid'];?>  data-xyzscriptsid="<?php echo $xyzscripts_user_id;?>" data-xyzscripts_hash="<?php echo $xyzscripts_hash_val;?>" name='del_entry' value="Delete" >
						 </span>
						 <span id='show_err_inactive_ln_<?php echo $i;?>' style="color:red;" ></span>
						 </td>
						 </tr>
						<?php 
							$i++;
						}
						}///////////////foreach
					?>
					<tr id="xyz_smap_no_auth_entries_ln" style="display: none;"><td>No Authorizations</td></tr>
					</table>
					<br/>
	<?php  }?>
					</div>	<br/><?php
}
}
else {
	echo "<div>Unable to connect. Please check your curl and firewall settings</div>";
}?>
</div>
</div>
