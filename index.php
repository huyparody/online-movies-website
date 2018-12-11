        <?php
            include './header.php';

        ?>
		<?php
		error_reporting(E_ERROR | E_PARSE);
		session_start();
		if(!isset($_SESSION)) 
		header('location:index.php');
		include "admin/config.php";
		?>
	<!-- Main -->
	<div id="main">
		<!-- Content -->
		<div id="content">
			<div class="info-film">
				<?php
					$select = $_GET['thaotac'];
					switch($select){
						case "thongtinphim":
							include_once('thongtinphim.php');
							break;
						default:
							include_once('listphim.php');
							break;
					}
				?>
			</div>
		</div>
		<!-- end Content -->

		<div class="cl">&nbsp;</div>
	</div>
	<!-- end Main -->

        <div id="footer">
                        <p> &copy; 2017 Aprotrain-Aptech. All Rights Reserved.  Designed by <a href="https://www.facebook.com/huyparody.xdavn" target="_blank" title="The Sweetest CSS Templates WorldWide">huyparody</a></p>
                </div>
                <!-- end Footer -->
        </div>
        <!-- end Shell -->
        </body>
        </html>