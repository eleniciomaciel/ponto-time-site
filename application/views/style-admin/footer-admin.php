<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>        
        <!-- Main page footer -->
		<footer id="footer">
			<div class="container">

				<!-- Footer info -->
				<p>Todos os diretos reservados a <a href="http://getbootstrap.com/">C8-Sistemas</a> by <a href="http://www.walkingpixels.com">C8-tecnologia |</a></p>

				<!-- Footer nav -->
				<ul>
					<li><a href="http://support.walkingpixels.com/">Suporte | </a></li>
					<li><a href="http://getbootstrap.com/getting-started/">Site | </a></li>
					<li><a href="http://parallaq.com/">Contato</a></li>
				</ul>
				<!-- /Footer nav -->

				<!-- Footer back to top -->
				<a href="#top" class="btn btn-back-to-top" title="Back to top"><span class="elusive icon-arrow-up"></span></a>

			</div>
		</footer>
		<!-- /Main page sweetalert -->
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		<!-- Bootstrap scripts -->
		<script src="<?=base_url()?>stylus/js/bootstrap/bootstrap.min.js"></script>

		<!-- jQuery DataTable -->
		<script src="<?=base_url()?>stylus/js/plugins/dataTables/jquery.datatables.min.js"></script>
		<script src="<?=base_url()?>stylus/js/jquery.mask.js"></script>
		<!-- Fileupload plugin -->
		<script src="<?=base_url();?>stylus/js/plugins/fileupload/bootstrap-fileupload.js"></script>
		<!-- Custom checkbox and radio -->
		<script src="<?=base_url();?>stylus/js/plugins/prettyCheckable/prettyCheckable.js"></script>
		<script>
			$(document).ready(function() {

				$('.styled-checkbox input, .styled-radio input').prettyCheckable();

			});
		</script>

		<script>

			/* Default class modification */
			$.extend( $.fn.dataTableExt.oStdClasses, {
				"sWrapper": "dataTables_wrapper form-inline"
			} );
			
			/* API method to get paging information */
			$.fn.dataTableExt.oApi.fnPagingInfo = function ( oSettings )
			{
				return {
					"iStart":         oSettings._iDisplayStart,
					"iEnd":           oSettings.fnDisplayEnd(),
					"iLength":        oSettings._iDisplayLength,
					"iTotal":         oSettings.fnRecordsTotal(),
					"iFilteredTotal": oSettings.fnRecordsDisplay(),
					"iPage":          Math.ceil( oSettings._iDisplayStart / oSettings._iDisplayLength ),
					"iTotalPages":    Math.ceil( oSettings.fnRecordsDisplay() / oSettings._iDisplayLength )
				};
			}
			
			/* Sangoma style pagination control */
			$.extend( $.fn.dataTableExt.oPagination, {
				"sangoma": {
					"fnInit": function( oSettings, nPaging, fnDraw ) {
						var oLang = oSettings.oLanguage.oPaginate;
						var fnClickHandler = function ( e ) {
							e.preventDefault();
							if ( oSettings.oApi._fnPageChange(oSettings, e.data.action) ) {
								fnDraw( oSettings );
							}
						};
						
						$(nPaging).addClass('pagination-right').append(
							'<ul class="pagination">'+
								'<li class="prev disabled"><a href="#">&larr; '+oLang.sPrevious+'</a></li>'+
								'<li class="next disabled"><a href="#">'+oLang.sNext+' &rarr; </a></li>'+
							'</ul>'
						);
						var els = $('a', nPaging);
						$(els[0]).bind( 'click.DT', { action: "previous" }, fnClickHandler );
						$(els[1]).bind( 'click.DT', { action: "next" }, fnClickHandler );
					},
					
					"fnUpdate": function ( oSettings, fnDraw ) {
						var iListLength = 5;
						var oPaging = oSettings.oInstance.fnPagingInfo();
						var an = oSettings.aanFeatures.p;
						var i, j, sClass, iStart, iEnd, iHalf=Math.floor(iListLength/2);
						
						if ( oPaging.iTotalPages < iListLength) {
							iStart = 1;
							iEnd = oPaging.iTotalPages;
						}
						else if ( oPaging.iPage <= iHalf ) {
							iStart = 1;
							iEnd = iListLength;
						} else if ( oPaging.iPage >= (oPaging.iTotalPages-iHalf) ) {
							iStart = oPaging.iTotalPages - iListLength + 1;
							iEnd = oPaging.iTotalPages;
						} else {
							iStart = oPaging.iPage - iHalf + 1;
							iEnd = iStart + iListLength - 1;
						}
						
						for ( i=0, iLen=an.length ; i<iLen ; i++ ) {
							// Remove the middle elements
							$('li:gt(0)', an[i]).filter(':not(:last)').remove();
							
							// Add the new list items and their event handlers
							for ( j=iStart ; j<=iEnd ; j++ ) {
								sClass = (j==oPaging.iPage+1) ? 'class="active"' : '';
								$('<li '+sClass+'><a href="#">'+j+'</a></li>')
									.insertBefore( $('li:last', an[i])[0] )
									.bind('click', function (e) {
										e.preventDefault();
										oSettings._iDisplayStart = (parseInt($('a', this).text(),10)-1) * oPaging.iLength;
										fnDraw( oSettings );
									} );
							}
							
							// Add / remove disabled classes from the static elements
							if ( oPaging.iPage === 0 ) {
								$('li:first', an[i]).addClass('disabled');
							} else {
								$('li:first', an[i]).removeClass('disabled');
							}
							
							if ( oPaging.iPage === oPaging.iTotalPages-1 || oPaging.iTotalPages === 0 ) {
								$('li:last', an[i]).addClass('disabled');
							} else {
								$('li:last', an[i]).removeClass('disabled');
							}
						}
					}
				}
			});
			
			/* Table #example */
			$(document).ready(function() {
				$('.datatable').dataTable( {
					"sDom": "<'row'<'col-xs-6'l><'col-xs-6'f>r>t<'row'<'col-xs-6'i><'col-xs-6'p>>",
					"sPaginationType": "sangoma",
					"oLanguage": {
						"sLengthMenu": "_MENU_ registros por página"
					}
				});
			});
		</script>
				

<?php 
$this->load->view('admin-c8/modais/modal_empresa');
$this->load->view('admin-c8/modais/modal_perfil');
 ?>
	</body>
</html>