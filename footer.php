<?php global $mr_stylesheet_dir; ?>				
				<footer class="footer" role="contentinfo">
					
						<div id="inner-footer" class="row clearfix">
						
							<div class="large-5 medium-5 columns">
								<p><strong>Michael Russell and Company</strong><br>
								PO Box 449<br>
								Manchester<br>
								M45 0DD</p>
								<p>
								Tel: 0161 773 6194<br>
								Fax: 0161 773 6194<br>
								Email: c.hurst@michaelrusselltrafford.co.uk<br>
								</p>
		    						<?php //joints_footer_links(); ?>
		    				</div>
							<div class="large-7 medium-7 columns">
							<p><img class="icpa-logo" src="<?php echo $mr_stylesheet_dir;?>/images/icpa-logo.png"><br>
							An Independent Certified Practising Accountant
							</p>
							</div>
			               
			                <div class="large-12 medium-12 columns">		
								<p class="source-org copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>.</p>
							</div>		
						</div> <!-- end #inner-footer -->			
					</footer> <!-- end .footer -->
				</div> <!-- end #container -->
			</div> <!-- end .inner-wrap -->
		</div> <!-- end .off-canvas-wrap -->
						
				<!-- all js scripts are loaded in library/joints.php -->
				<?php wp_footer(); ?>
	</body>

</html> <!-- end page -->