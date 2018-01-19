// JavaScript Document

$(function(){
	
	
	
                  $('#menuDeroulant li a , #ajaxLink').live('click',function(){
					  
	                    var $href = $(this).attr('href');
						//alert($href);
						$putItThere = $('#center_line');
						$.ajax({
				  url: $href,
				  type:"GET",
				  //dataType:"json",
				 // data:id,
				 beforeSend:function(){
					$putItThere.animate({opacity:0.4},1000); 
					 },
				  success: function(data){
								
								//var mylist = $(data).find('#list');
								 $putItThere.empty().append(data).animate({opacity:10},100);
								 styleList();
								$('form#searchBox').attr('action',$href);
								initThoseVar();
							
				  },
				  error:function(xhr,err){
							alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status);
							alert("responseText: "+xhr.responseText);
						},
				  complete:function(data){
	
					  
				  }		
				});

						
						return false;
	
	      });
						 
						 	
						 
						 $('#searchBoxSelect').live('change',function(){
							 var $myForm = $('form#searchBox'),
	                              href = $myForm.attr('action'),
						         formData = $myForm.serialize(),
								 $putItThere = $('#center_line table#list');
						
						//alert($href);
				  $.ajax({
				  url: href,
				  type:"POST",
				  //dataType:"json",
				   data:formData,
				   beforeSend:function(){
					$putItThere.animate({opacity:0.4},1000); 
					 },
				  success: function(data){
								
								 var mylist = $(data).find('#list');
								 $putItThere.empty().append(mylist).animate({opacity:10},100);
								 styleList();
								//$('form#searchBox').attr('action',$href);
								initThoseVar();
							
				  },
				  error:function(xhr,err){
							alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status);
							alert("responseText: "+xhr.responseText);
						},
				  complete:function(data){
	                   
				  }		
				});
						//$.post($href,donne,function(data){
//							
//							$('#center_line').fadeOut(50,function(){
//								
//								$(this).empty().append(data).fadeIn(50);
//								
//								styleList();
//								$('form#searchBox').attr('action',$href);
//								});
//							
//							})
	
	                    //alert('u click me');
						
						return false;
	
	                     });
						 
						 
						 $('#loginBtn').live('click',function(){
							 
							alert('u got me'); 
							
							return false;
							 
							 })	
	
});


