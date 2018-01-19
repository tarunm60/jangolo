// JavaScript Document
var serviceURL = "http://intranet.multisatplus.com/index.php/";
/*$(document).ready(function() {
						  
	$("#appel").click(function() {
			$(".appelform").show();	
			//return false;
							   });
	
						   });*/

//function to run immediately after the page loads 

jQuery(document).ready(function(){
	$('.accordion .head').click(function() {
		$(this).next().toggle('slow');
		return false;
	}).next().hide();
});
function styleList ()
	{
	 $('table#list tr:nth-child(1n)').addClass('odd');
     $('table#list tr:nth-child(2n)').addClass('even');
	}
	
		
$(document).ready(function(){
	
		(function loadTaskEveryTime (){
			
			  loadTask();
			setTimeout(arguments.callee, 150000);
		     })();
	
	   $('img#refreshTask').live('click',function(){loadTask();})
	
	
	
	
    		function startEndTask(url,formData) {
				
				$.ajax({
					  url: url,
					  type:"POST",
					  data:formData,
					  success: function(data){
						
						if($('#startEndTask').attr('name')=='start') $('#startEndTask').val('Done');
						else{ 
						 if( $('#startEndTask').hasClass('mytask')) $('#startEndTask').parent().parent().parent().remove(); 
						  else $('#startEndTask').remove();
						}
	
					  },
					  error:function(xhr,err){
								alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status);
								alert("responseText: "+xhr.responseText);
							},
					  complete:function(data){
						   
					  }		
			     });
			
			}


	$('#startEndTask').live('click',function(){
								
		var $form = $(this).parent();
		var url = $form.attr('action');
		var formData = $form.serialize();
		if($(this).attr('ticket')!='0' && $(this).attr('name')=='done')
		{
	   
	            var html = '<form id="ticketFeedback"><textarea name="feedbackticket" id="feedbacktextarea" rows="10" cols="30"> </textarea><input type="hidden" name="ticket_id" value="'+$(this).attr('ticket')+'"/></form>';
	   			$('body').append(html);
	   			$('#ticketFeedback').dialog({
								   title:'Ticket resolution feedback',
								   modal:true,
								   buttons: {
												"send":{
												  text:'Enregistrer',
												  classes:'mysubmit',
												  click:function(){
													
													var supData = $('#ticketFeedback').serialize();
													//alert(supData); alert(formData);
													formData = supData +"&" + formData;
													//alert(formData);
													
													startEndTask(url,formData);
													$(this).dialog("close");
													$('#ticketFeedback').remove();
													}
												},
												"cancel":{
												  text:'Annuller',
												  classes:'mysubmit'
												}, 
												
								   
								              }
								   
								   
								   });

		
		}
		else startEndTask(url,formData);

		return false;					  
	 });
	
	$('input[name="ticket"]').live('click',function(){
													
		var url = '/index.php/tasks/getclient' ;
		if($(this).is(':checked'))
		{
			  $.ajax({
				  url: url,
				  type:"POST",

				  success: function(data){
						
				  $('input[name="ticket"]').parent().parent().after(data);

				  },
				  error:function(xhr,err){
							alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status);
							alert("responseText: "+xhr.responseText);
						},
				  complete:function(data){
	                   
				  }		
				});
		}
		else  $('#customer').remove();
		
		
	  });
	
	
	
	styleList();
  
  	$(".fui").click(function(){$("div.lol").animate({height:300},"slow");});
	$("#newshead_right").click(function() {	$(".conto").slideToggle();	});


							$.getJSON(serviceURL +'ressources/test', 
									function(data) {
													$('#chats').append('<li>' + data.text + '</li>');
													}
							)



function showUser(str)
{
if (str=="")
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","http://side.camsider.com/index.php/lino/userdetails?q="+str,true);
xmlhttp.send();
}


function showCompanies(str)
{
if (str=="")
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","http://side.camsider.com/index.php/company/test0?q="+str,true);
xmlhttp.send();
}
function fill(id,cname)
{
	if (window.XMLHttpRequest)
		  {// code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
		  }
		else
		  {// code for IE6, IE5
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
			xmlhttp.onreadystatechange=function()
		  {
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				document.myform.cname.value = xmlhttp.responseText;
/*			document.getElementById("viewcont"+str).innerHTML=xmlhttp.responseText;
*/			}
		  }
		xmlhttp.open("GET","http://side.camsider.com/index.php/company/test1?q="+cname,true);
		xmlhttp.send();
	
}
// function to remove the last part of the url 
 var removeLastPart = function(url) 
		  				   {
								var lastSlashIndex = url.lastIndexOf("/");
								if (lastSlashIndex > url.indexOf("/") + 1) { // if not in http://
									return url.substr(0, lastSlashIndex); // cut it off
								} else {
									return url;
								}
							}
function showView(str,ctr)
	{
		// to get the url 
		  var url = window.location.pathname;
		
		
		if (window.XMLHttpRequest)
		  {// code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
		  }
		else
		  {// code for IE6, IE5
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
			xmlhttp.onreadystatechange=function()
		  {
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				
			document.getElementById("viewcont"+str).innerHTML='';	
			document.getElementById("viewcont"+str).innerHTML=xmlhttp.responseText;
			$(".appelform").hide();
			$("#appel").click(function() {
			$(".appelform").toggle();	
							   });
			
			
			}
			
		  }
		xmlhttp.open("GET",removeLastPart(url)+"/"+ctr+"/viewi?id="+str,true);
		//alert(url.replace(/\/lion\//, '/'));
		//alert(url.replace(/^[^\/]*(?:\/[^\/]*){2}/, ""));
		//alert(removeLastPart(removeLastPart(url)));
		xmlhttp.send();
		$('div#viewcont'+str).slideDown();
	}



// sign in or off for the worker by raoul

// senddata

function sendata(action,user_id)
{
	var obj;
	
	if(action=="in") var meth ="insert";
	else  var meth ="update";
	var param ="user_id="+user_id;
	
			if (window.XMLHttpRequest)
			{// code for IE7+, Firefox, Chrome, Opera, Safari
		     obj=new XMLHttpRequest();
			//alert(param);
		    }
		    else
		    {// code for IE6, IE5
		     obj=new ActiveXObject("Microsoft.XMLHTTP");
		    }
		  
		  obj.onreadystatechange=function()
		  {
			  //alert(param);
		    if (obj.readyState==4 )
			   {
				   alert(obj.responseText);
                  // alert(obj.responseText);
			   }
			else if (obj.readyState ==3) alert("server on work");
			//else if (obj.readyState < 4) alert("loading");
		
			  // else alert("some error occured");
		  }
			obj.open("POST","/index.php/timer/woo",true);
			obj.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			obj.send(param);
		  
		  
}
function changeStatus()
{
	var e = window.event;
	var targ;
	if (e.target) targ = e.target;
	else if (e.srcElement) targ = e.srcElement;
	//alert(targ.value);
    var val = targ.value ;
	
	if(val=='on')// that mean we shoul turn everything on 
	{
		document.getElementById('off').style.display= "inline";
		document.getElementById('on').style.display= "none";
		document.getElementById('checkForm').style.display= "none";
		var action = "in";
		user_id=document.getElementById('user_id').value;
		
		sendata(action,user_id);
	}
	else if(val=='off')
	{
		
		//document.getElementById('off').style.display= "none";
		document.getElementById('checkForm').style.display= "block";
	}
	else // send info to the data base close the form and change the button 
	{
	 document.getElementById('on').style.display= "inline";
	 document.getElementById('off').style.display= "none";
	 document.getElementById('checkForm').style.display= "none";
	 var action = "off";
	 var user_id ;
	 user_id=document.getElementById('user_id').value;
	 var comment ;
	 comment = document.getElementById('comment').value;
	// alert(comment);
	 
	
	// alert(user_id);
	// alert(comment);
	 
	 //sendata(action,user_id);
	}
	
}
// raoul to hidde the note field of the the asv form 

						      $('.avsNote').hide();
							  $('.comand').hide();
							  $('.avs_form').hide();
							  $('.response_form').hide();
							  $('.form1').hide();
							   $('.form2').hide();
							   $('.accepted_btn , .rejected_btn ,table#list tr').css("cursor","pointer")
							  $('table#list tr').mouseover(function()
												{
												 $('.avsNote').show();	
																	
												})
							    $('table#list tr ').mouseout(function()
												{
												 $('.avsNote').hide();	
																	
												})
								$('table#list tr td ').not('.checkbox').click(function()
												{
													var myClass = $(this).attr("class");
													
													if( $(this).parent('tr').next('.comand').is(':hidden') )
													{$(this).parent('tr').next('.comand').slideDown();}
													else $(this).parent('tr').next('.comand').hide();
												})
								
								 $('.accepted_btn').click(function()
												{
												    
													$('.form2').show();
													$('.form1').hide();
													
													
															   
												})
								  $('.rejected_btn').click(function()
												{
													$('.form1').show();
													$('.form2').hide();
													 
													
															   
												})
								

						  
						  $('.avsNote').hide();
						  $('.avsNote').append("hohoa");
						   

						   
  
// raoul to validate the avs form 


						   
						   var amount = 0;
						   
						    amount = $("input[name='amount']").val();
						  $('#avsAmount').focusout(function()
										{
										 if($("input[name='amount']").val()>amount)
										   {$("input[name='amount']").val(amount);
										    $(".avsAmount").append("you can not request more than "+amount);
										   }  				   
										});
						  				   
						 

// raoul accordion for the avs form 

						   
						      $('.avsContenair').hide();
							 // $('.asvTrigger span:first-child').hide();
							  
							   $('.asvTrigger').css('cursor','pointer');
							  //
							  $('.asvTrigger').click(function(){
								if($("input[name='amount']").val()==0)
								{   $('.avsContenair table').hide();
								    $('.avsContenair br,.avsContenair span').remove();
								   
									$('.avsContenair').append('</br><span>Sorry you can not request any advance over your sallary for the moment contact the financial departement for more information  <span>');
									 $('.avsContenair ').slideDown('slow');
									setTimeout(function(){
														$('.avsContenair span').fadeOut('slow');
														 $('.avsContenair ').slideUp('slow');
														 $('.avsContenair br,.avsContenair span').remove()
														},4000);
								}
								else{ if($('.avsContenair').is(':hidden'))
									     { $('.avsContenair').slideDown("slow");}
									   else $('.avsContenair').slideUp("slow"); 
									}
									  
									return false;
															 });
									
							       			   
 	$('#checkall').click(
				   
   		function()
   		{
      		$("INPUT[type='checkbox']").attr('checked', $('#checkall').is(':checked'));   
   		});
 		    
	$('table#income_form .company').hide();
	$('table#income_form .bank_info').slideUp();
	$('table#income_form .interest').hide();
	$('table#income_form .invoice').hide();
			
			
			
			// check wether the income is related to an invoice or something else
			$('select.income_type').change(function(){
													  
													 
											var selected;
											selected = $('select.income_type option:selected').val();
											 if(selected=='donation' )
												{
												 $('table#income_form .company').slideDown('slow');	
												 $('table#income_form .interest').slideUp('slow');
												 $('table#income_form .invoice').slideUp('slow');
												 $('<input>').attr({
																   type:'hidden',
																   name:'comp_in'}).appendTo('#income_form')
												}
												else if( selected=='loan')
												{
													 $('table#income_form .company').slideDown('slow');	
													  $('table#income_form .interest').slideDown('slow');
													   $('<input>').attr({
																   type:'hidden',
																   name:'comp_in'}).appendTo('#income_form')
													  
												}
												else if(selected=='invoice')
												{
													$('table#income_form .invoice').slideDown('slow');
													$('table#income_form .company').slideUp('slow');
													$('table#income_form .interest').slideUp('slow');
												}
												else  
												{$('table#income_form .company').hide();
												  
												  $('table#income_form .invoice').slideUp('slow');
												  $('table#income_form .interest').slideUp('slow');
												 $('table#income_form .invoice').slideUp('slow');
												}
													 
									});
			$('select.paymeth').change(function(){
												
											var selected='';
											selected= $('select.paymeth option:selected').val();
											if(selected==2)
										{
												$('table#income_form .bank_info').slideDown('slow');
												$('<input>').attr({
																  type: 'hidden',
																  name: 'bank_in'
																  }).appendTo('#income_form');
												
											}
											else $('table#income_form .bank_info').slideUp('slow');
												});
			
			
						   

						   $('#clicko_me').css("cursor","pointer");
						   var ur = window.location.href;
						   var u = removeLastPart(ur);
						   var count = 1;
						   
						   $('#clicko_me').click(function()
							{
									//$('#clicko_me').html('retreivinng...');	
									//$('#clicko_me').html(ur);
									
									$.ajax({
										   type: "POST",
										   url: u+"/items/",
										   data:"count="+count,
										   success: function(msg){
											   $('.items').before(msg);
											   //$('#clicko_me').html('');
											   
											   $("INPUT[name='count']").val(count);
											   count++; }
											 
											   
										   });
														
							 })
							 var $bg 
							 


		   
		   $('input.datepicker').live('focus',function(){
			   $(this).datepicker(
			   { dateFormat: 'yy-mm-dd' ,
				 changeMonth: true,
				 changeYear: true,
				 yearRange:"-10:-0"
			   
			   });
		   })
		   
		    $('input..datepickerDob').live('focus',function(){
				
					$('.datepickerDob').datepicker(
			   { dateFormat: 'yy-mm-dd' ,
				 changeMonth: true,
				 changeYear: true,
				 yearRange:"-40:-16"
			   
			   });
		   });
		   
		   $('input.datepickertime').live('focus',function(){
		    $(this).datetimepicker({
				
				dateFormat: 'yy-mm-dd' ,
				timeFormat: 'hh:mm:ss',
				hourMin: 8,
				hourMax: 19,
		     
				});
			});
		   
		   //$('.datepickertime').timepicker({});
		   

						$('#mtask_content').hide();
						$('.accordionButton').css("cursor","pointer");
						$('.accordionContent').hide();
				
						
						var n = $('.accordionContent tr').length;
						if(n>0)
						{
						 $('.accordionButton').append('<span id="taskamount">'+n+'</span>');
						}
						
						$('.accordionButton').click(function(){
															 
											 if($('.accordionContent').is(':hidden'))
											 {
												$('.accordionContent').slideDown('slow'); 
											 }
											 else $('.accordionContent').slideUp('slow');
															 
															 })

						   $('table#project_form #status_trigger').hide();
						   $('#status_load').change(function(){
							
								if($('this').val()!='')
							   {
								    $('table#project_form #status_trigger').show();
							   }
															 
															 })
						   
						   });


//ulrich task will block the opening of a new page, but will load the assign to form
	   
		/*	$('.ba').click.(function(){
										
									return false ;	
											})*/
					   

//ulrich-hides company and contact when checkbox is clicked on new project form

						   
	$("INPUT[name='internal']").click(function(){	   
	if ($(this).is(':checked')){
		$('.hide_me').hide();}
		//$('.hide_me').remove();
		//$("INPUT[name='company']").val('comp');}
		else{$('.hide_me').show();}
															   });
															   




