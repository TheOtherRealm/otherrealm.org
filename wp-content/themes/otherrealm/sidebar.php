<?php

/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package otherrealm
 */

if (!is_active_sidebar('sidebar-1')) {
	return;
}
?>
<aside id="secondary" class="widget-area">
	<?php dynamic_sidebar('sidebar-1'); ?>
</aside><!-- #secondary -->
<!--<aside class="layout-sidebar-first" id="secondary" role="complementary">
	<div class="region region-sidebar-first" style="display: block;">
		<nav role="navigation" aria-labelledby="block-otherrealm-main-menu-menu" id="block-otherrealm-main-menu"
			class="settings-tray-editable" data-drupal-settingstray="editable">
			<h2 class="visually-hidden" id="block-otherrealm-main-menu-menu">Main navigation</h2>
			<ul>
				<li>
					<p>
						<a href="/About" title="about" class="sidebartitle=">
							<img src="/otherrealm.org/web/themes/otherrealm/img/About.png" alt="About" title="About"
								class="menuImg">
							About
						</a>
					</p>
					<ul>
						<li>
							<a href="/" data-drupal-link-system-path="<front>" class="is-active">Home</a>
						</li>
						<li>
							<a href="/contact" data-drupal-link-system-path="node/2">Contact</a>
						</li>
						<li>
							<a href="/governance" data-drupal-link-system-path="node/1">Governance</a>
						</li>
					</ul>
				</li>
				<li>
					<p>
						<a href="/Economy" title="economy" class="sidebartitle=">
							<img src="/otherrealm.org/web/themes/otherrealm/img/Economy.png" alt="Economy"
								title="Economy" class="menuImg">
							Economy
						</a>
					</p>
					<ul>
						<li>
							<a href="/StaffingShaftedChaff" title="Satirically Staffing Shafted Chaff"
								data-drupal-link-system-path="node/9">Shafted Chaff</a>
						</li>
						<li>
							<a href="/IHaveAJob" data-drupal-link-system-path="node/19">I Have a Job</a>
						</li>
						<li>
							<a href="/IHaveAnIdea" data-drupal-link-system-path="node/17">I Have an Idea</a>
						</li>
						<li>
							<a href="/IWantAJob" data-drupal-link-system-path="node/16">I Want a Job</a>
						</li>
						<li>
							<a href="/IWantToInvest" data-drupal-link-system-path="node/18">I Want to Invest</a>
						</li>
					</ul>

				</li>
				<li>
					<p>
						<a href="/othersites" title="internet" class="sidebartitle=">
							<img src="/otherrealm.org/web/themes/otherrealm/img/Internet.png" alt="Internet"
								title="Internet" class="menuImg">
							Internet
						</a>
					</p>
					<ul>
						<li>
							<a href="/Consulting" data-drupal-link-system-path="node/15">Support &amp; Consulting</a>
						</li>
					</ul>

				</li>
			</ul>
		</nav>
	</div>
</aside>-->