 <div id="app-sidepanel" class="app-sidepanel">
 	<div id="sidepanel-drop" class="sidepanel-drop"></div>
 	<div class="sidepanel-inner d-flex flex-column">
 		<a href="#" id="sidepanel-close" class="sidepanel-close d-xl-none">&times;</a>
 		<div class="app-branding">
 			<a class="app-logo" href="index.html">
 				<img class="logo-icon me-2" src="assets/images/app-logo.svg" alt="logo"><span class="logo-text">{{ App\Helpers\ConfigHelper::getAppName() }} </span></a>
 		</div><!--//app-branding-->

 		<nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
 			<ul class="app-menu list-unstyled accordion" id="menu-accordion">
 				<li class="nav-item">
 					<!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
 					<a class="nav-link active" href="{{ route('dashboard') }}">
 						<span class="nav-icon">
 							<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house-door" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
 								<path fill-rule="evenodd" d="M7.646 1.146a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5H9.5a.5.5 0 0 1-.5-.5v-4H7v4a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6zM2.5 7.707V14H6v-4a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v4h3.5V7.707L8 2.207l-5.5 5.5z" />
 								<path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
 							</svg>
 						</span>
 						<span class="nav-link-text">Dashboard</span>
 					</a><!--//nav-link-->
 				</li><!--//nav-item-->


 				<!-- Afficher le bouton qui contient le menu pour les administrateurs -->

 				<li class="nav-item has-submenu">
 					<!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
 					<a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-1" aria-expanded="false" aria-controls="submenu-1">
 						<span class="nav-icon">
 							<!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
 							<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-files" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
 								<path fill-rule="evenodd" d="M4 2h7a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H4z" />
 								<path d="M6 0h7a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2v-1a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H6a1 1 0 0 0-1 1H4a2 2 0 0 1 2-2z" />
 							</svg>
 						</span>
 						<span class="nav-link-text">Administrateurs</span>
 						<span class="submenu-arrow">
 							<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
 								<path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
 							</svg>
 						</span><!--//submenu-arrow-->
 					</a><!--//nav-link-->
 					<div id="submenu-1" class="collapse submenu submenu-1" data-bs-parent="#menu-accordion">
 						<ul class="submenu-list list-unstyled">
 							<li class="submenu-item"><a class="submenu-link" href="{{ route('administrateurs') }}">Liste des Administrateurs</a></li>
 							<li class="submenu-item"><a class="submenu-link" href="{{ route('administrateurs.create') }}">Ajouter un Administrateur</a></li>

 						</ul>
 					</div>
 				</li><!--//nav-item-->
 				<!-- Afficher le bouton qui contient le menu pour les employers -->

 				<li class="nav-item has-submenu">
 					<!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
 					<a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-2" aria-expanded="false" aria-controls="submenu-2">
 						<span class="nav-icon">
 							<!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
 							<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-files" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
 								<path fill-rule="evenodd" d="M4 2h7a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H4z" />
 								<path d="M6 0h7a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2v-1a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H6a1 1 0 0 0-1 1H4a2 2 0 0 1 2-2z" />
 							</svg>
 						</span>
 						<span class="nav-link-text">Utilisateurs</span>
 						<span class="submenu-arrow">
 							<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
 								<path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
 							</svg>
 						</span><!--//submenu-arrow-->
 					</a><!--//nav-link-->
 					<div id="submenu-2" class="collapse submenu submenu-2" data-bs-parent="#menu-accordion">
 						<ul class="submenu-list list-unstyled">
 							<li class="submenu-item"><a class="submenu-link" href="{{ route('employer.index') }}">Liste des Utilisateurs</a></li>
 							<li class="submenu-item"><a class="submenu-link" href="{{ route('employer.create') }}">Ajouter un Utilisateurs</a></li>

 						</ul>
 					</div>
 				</li><!--//nav-item-->

 				<!-- Afficher le bouton qui contient le menu pour les departements -->

 				<li class="nav-item has-submenu">
 					<!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
 					<a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-3" aria-expanded="false" aria-controls="submenu-3">
 						<span class="nav-icon">
 							<!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
 							<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-files" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
 								<path fill-rule="evenodd" d="M4 2h7a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H4z" />
 								<path d="M6 0h7a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2v-1a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H6a1 1 0 0 0-1 1H4a2 2 0 0 1 2-2z" />
 							</svg>
 						</span>
 						<span class="nav-link-text">Departements</span>
 						<span class="submenu-arrow">
 							<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
 								<path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
 							</svg>
 						</span><!--//submenu-arrow-->
 					</a><!--//nav-link-->
 					<div id="submenu-3" class="collapse submenu submenu-3" data-bs-parent="#menu-accordion">
 						<ul class="submenu-list list-unstyled">
 							<li class="submenu-item"><a class="submenu-link" href="{{ route('departement.index') }}">Liste des departements</a></li>
 							<li class="submenu-item"><a class="submenu-link" href="{{ route('departement.create') }}">Ajouter un departement</a></li>

 						</ul>
 					</div>
 				</li><!--//nav-item-->
 				<!-- Afficher le bouton qui contient le menu pour les paiements -->
 				<li class="nav-item">
 					<!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
 					<a class="nav-link" href="{{ route('payments') }}">
 						<span class="nav-icon">
 							<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-folder" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
 								<path d="M9.828 4a3 3 0 0 1-2.12-.879l-.83-.828A1 1 0 0 0 6.173 2H2.5a1 1 0 0 0-1 .981L1.546 4h-1L.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3v1z" />
 								<path fill-rule="evenodd" d="M13.81 4H2.19a1 1 0 0 0-.996 1.09l.637 7a1 1 0 0 0 .995.91h10.348a1 1 0 0 0 .995-.91l.637-7A1 1 0 0 0 13.81 4zM2.19 3A2 2 0 0 0 .198 5.181l.637 7A2 2 0 0 0 2.826 14h10.348a2 2 0 0 0 1.991-1.819l.637-7A2 2 0 0 0 13.81 3H2.19z" />
 							</svg>
 						</span>
 						<span class="nav-link-text">Paiements</span>
 					</a><!--//nav-link-->
 				</li><!--//nav-item-->

 			</ul><!--//app-menu-->
 		</nav><!--//app-nav-->
 		<div class="app-sidepanel-footer">
 			<nav class="app-nav app-nav-footer">
 				<ul class="app-menu footer-menu list-unstyled">
 					<li class="nav-item">
 						<!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
 						<a class="nav-link" href="{{ route('configurations') }}">
 							<span class="nav-icon">
 								<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-gear" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
 									<path fill-rule="evenodd" d="M8.837 1.626c-.246-.835-1.428-.835-1.674 0l-.094.319A1.873 1.873 0 0 1 4.377 3.06l-.292-.16c-.764-.415-1.6.42-1.184 1.185l.159.292a1.873 1.873 0 0 1-1.115 2.692l-.319.094c-.835.246-.835 1.428 0 1.674l.319.094a1.873 1.873 0 0 1 1.115 2.693l-.16.291c-.415.764.42 1.6 1.185 1.184l.292-.159a1.873 1.873 0 0 1 2.692 1.116l.094.318c.246.835 1.428.835 1.674 0l.094-.319a1.873 1.873 0 0 1 2.693-1.115l.291.16c.764.415 1.6-.42 1.184-1.185l-.159-.291a1.873 1.873 0 0 1 1.116-2.693l.318-.094c.835-.246.835-1.428 0-1.674l-.319-.094a1.873 1.873 0 0 1-1.115-2.692l.16-.292c.415-.764-.42-1.6-1.185-1.184l-.291.159A1.873 1.873 0 0 1 8.93 1.945l-.094-.319zm-2.633-.283c.527-1.79 3.065-1.79 3.592 0l.094.319a.873.873 0 0 0 1.255.52l.292-.16c1.64-.892 3.434.901 2.54 2.541l-.159.292a.873.873 0 0 0 .52 1.255l.319.094c1.79.527 1.79 3.065 0 3.592l-.319.094a.873.873 0 0 0-.52 1.255l.16.292c.893 1.64-.902 3.434-2.541 2.54l-.292-.159a.873.873 0 0 0-1.255.52l-.094.319c-.527 1.79-3.065 1.79-3.592 0l-.094-.319a.873.873 0 0 0-1.255-.52l-.292.16c-1.64.893-3.433-.902-2.54-2.541l.159-.292a.873.873 0 0 0-.52-1.255l-.319-.094c-1.79-.527-1.79-3.065 0-3.592l.319-.094a.873.873 0 0 0 .52-1.255l-.16-.292c-.892-1.64.902-3.433 2.541-2.54l.292.159a.873.873 0 0 0 1.255-.52l.094-.319z" />
 									<path fill-rule="evenodd" d="M8 5.754a2.246 2.246 0 1 0 0 4.492 2.246 2.246 0 0 0 0-4.492zM4.754 8a3.246 3.246 0 1 1 6.492 0 3.246 3.246 0 0 1-6.492 0z" />
 								</svg>
 							</span>
 							<span class="nav-link-text">Configurations</span>
 						</a><!--//nav-link-->
 					</li><!--//nav-item-->


 				</ul><!--//footer-menu-->
 			</nav>
 		</div><!--//app-sidepanel-footer-->

 	</div><!--//sidepanel-inner-->
 </div><!--//app-sidepanel-->