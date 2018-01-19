// JavaScript Document

var backColor , Color, width,
	 rowHeight ,
	 rowFontSize;
	 
	 function initThoseVar(){
	 rowHeight = $('.row td').height(),
	 rowFontSize= $('.row td').css('font-size'); 
		 }


$(function(){
	
     	 
	 $('.row:not(.caption)').live("mouseenter", function() {
		 Color = $(this).css('color');
		 backColor = $(this).css('background-color');
						$(this).animate({
							'backgroundColor' :'#5c9ccc',
							'color' :'white' 
							},100);
					
	 }).live("mouseleave", function() {
	//	 $(this).css({
//			 
//			 'background-color':backColor,
//			 'color' :Color 
//		 }
		  $(this).animate({
			 
			 backgroundColor:backColor,
			 color :Color 
		 },100
		 
		 );
	 });
	 
	//	 $('.row:not(.caption) td').live("mouseenter", function() {
//						$(this).animate({
//							height : 30,
//							fontSize:rowFontSize+5,
//							},100,function(){});
//							
//							$(this).css({
//								'font-weight':'bold'
//								})	
//							
//	 }).live("mouseleave", function() {
//		$(this).animate({
//							height : rowHeight,
//							fontSize:rowFontSize,
//							
//							},100,function(){});
//		$(this).css({
//								'font-weight':'normal'
//								})
//		 
//	 });


	
	
	
	
	function toggleView(me)
{
	if(me.parent().next().hasClass('view'));
	else me.parent('tr').after('<tr class="view"></tr>');
	
    var tr = me.parent('tr').next('tr');
	var ctr = me.parent('tr').attr('controller');
	var id = me.parent('tr').attr('id');
	if( tr.is(':empty') )
	{
			$.get('/index.php/'+ctr+'/viewi?id='+id,function(data)
			{
			tr.empty().append('<td colspan="20"><div class="myview">'+data+'</div></td>').css('display','table-row');
			tr.find('.myview').slideDown('slow');
			})
	}
	else 
	{ 
		tr.find('.myview').slideUp('slow',function(){tr.remove();   });
	}
	
}

		$('table#list tr.row td:not(.checkbox)').live('click',function(){
			
			var me = $(this);
			if(me.has)										
			 toggleView(me);
		   return false;	
		
		});
	
})
