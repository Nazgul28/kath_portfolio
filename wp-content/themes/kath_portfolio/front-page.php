<?php
/**
 * The template for displaying home page.
 *
 * @package RED_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">



		<div class="hero">
			<span class="herotext"><p>Katherine is a UX designer supported by a background in visual and graphic design.
	Motivated by innovation when it directly relates to an improved human experience, with digital products & brand development.</p>
			<a href="<?php echo home_url('/#what'); ?>" class="button"> What I do </a>
			</span>
		</div>
 
		<div class="what">
			<h2> What I do </h2>
			<h3> I question if there is a better solution and then strive to find it.</h3>
			<p> Using a combination of design thinking, healthy curiosity, and a toolbox of skills that usually include:
			 Digging into qualitative & quantitative research, information architecture, user flows & stories.
			 Building prototypes, wireframes & constantly user testing. 
		 I thrive when problem solving & working towards finding the most enjoyable solution for the user and the best solution for the client.</p>
		
		</div>

		<hr class="decorative">
		<a name="what"></a>
		</hr>

	<div class="container">
		<div class ="about">
			<h2> About me </h2>
			<p> I have always been infatuated with design, from simple elegant visuals to cheeky work that stands for something.
			 It started as the editor of my high school yearbook  and carried me to a degree in Graphic Design from the Art Institute of Vancouver.
			 From there I worked everything from start up to freelance, while I love visual design, I finally felt the missing pieces come together when I moved towards User Experience.
			 I am built for the team work and collaboration that lends itself so well to the UX process, and to see the visuals made so much stronger by the reasoning and understanding that comes from designing for the user first makes me excited for the future of tech, and the future of building things.</p>
		</div>


		<div class="education">
			<ul class="education-list">
				<li><h2> RED Academy</h2></li>
				<li>Full Time UX Design Program</li>
				<li><span> — Graduate December 2015</span></li>
				<li><h2> The Art Institute of Vancouver Graphic Design Diploma </h2></li>
				<li> Portfolio Awarded “Best in Show” </li> 
				<li><span>— March 2010</span></li>
				<li><h2> Landmark Education </h2></li>
				<li>Forum & Communication Courses </li>
				<li><span> — Continuous</span></li>
			</ul>
			<a href="<?php echo home_url('/work/'); ?>" class="button"> View Work </a>
		</div>
	</div>

		<div class="love">
			<h2> I Love </h2>
			<ul class="love-list">
				<li> Hiking & Outdoors </li>
				<li> Teamwork, group work, people! </li>
				<li> The Simerillion </li>
				<li> Osho </li>
				<li> Design is a Job </li>
				<li> Frank Chimero </li>
				<li> Anthony Bordaine </li>
				<li> James Victore </li>
				<li> Crew </li>
				<li> Ideo </li>
				<li> DIN </li>
				<li> Assassins Creed </li>
				<li> Post-it notes </li>
				<li> RED Academy </li>
				</ul>
		</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>