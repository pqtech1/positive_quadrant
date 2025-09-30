<style>
	.accordion {
		background-color: #eee;
		color: #444;
		cursor: pointer;
		padding: 18px;
		width: 100%;
		border: none;
		text-align: left;
		outline: none;
		font-size: 15px;
		transition: 0.4s;
	}

	.active,
	.accordion:hover {
		background-color: #ccc;
	}

	.accordion:after {
		content: '\002B';
		color: #777;
		font-weight: bold;
		float: right;
		margin-left: 5px;
	}

	.active:after {
		content: "\2212";
	}

	.panel {
		padding: 0 18px;
		background-color: white;
		max-height: 0;
		overflow: hidden;
		transition: max-height 0.2s ease-out;
	}

	#project {
		color: #1a9c9b;
	}

	#project.hvr-underline-from-center:before {
		left: 0;
		right: 0;
	}
</style>

<br/>
<div class="container trainingDetailPageParent">
	<div class="trainingDetailPageParentTop">
		<div class="trainingDetailPageParentTopLeft">
			<h1 class="pq_h1 pq_left">Explore Our Comprehensive Training Curriculum on <span><?php echo $syllabus[0]['cname'] ?></span></h1>
			<p class="pq_p">Discover the full potential of <?php echo $syllabus[0]['cname'] ?>, one of the most essential tools in
				today’s
				market. Whether you're looking to build cutting-edge applications, enhance your skills, or
				explore new career opportunities, <?php echo $syllabus[0]['cname'] ?> offers everything you need. Our
				training curriculum
				provides a comprehensive overview, covering all key aspects from the fundamentals to advanced
				techniques. Learn how to leverage <?php echo $syllabus[0]['cname'] ?> to create real-world solutions,
				gain hands-on
				experience with industry-standard tools, and stay ahead of the curve in an ever-evolving landscape. Join
				us and take the next step in mastering <?php echo $syllabus[0]['cname'] ?>!"</p>
		</div>
		<div class="trainingDetailPageParentTopRight">
			<img src="<?php echo $this->config->item('image_path'); ?>/uploads/courses/<?php echo $syllabus[0]['cimage'] ?>"
				alt="Course Image">
		</div>
	</div>
</div>


<div class="container courseHighlights">
	<div class="courseHighlightsLeft">
		<h2>Course Highlights</h2>
		<div class="courseDetails">
			<?php
			$course_highlight = explode(',', $syllabus[0]['chighlight']);

			// Check if the $course_highlight array is not empty
			if (!empty($course_highlight)) {
				?>
				<?php foreach ($course_highlight as $highlight) { ?>
					<ul> <!-- Wrap your list inside an <ul> tag for better structure -->

						<div class="iconDiv"><i class="fa fa-check"></i> </div>
						<li><?php echo $highlight; ?></li>

					</ul>
				<?php } ?>
				<?php
			}
			?>
		</div>

	</div>
	<div class="courseHighlightsRight">
		<img src="<?= base_url() ?>/assets/img/training_details.jpg" alt="">
	</div>

</div>

<div class="container courseWillTeach">
	<h2>What you'll learn in this <?php echo $syllabus[0]['cname'] ?> course</h2>
	<p><?php echo $syllabus[0]['cdesc']; ?></p>
</div>


<div class="container thisCourseIncludes">
	<div class="thisCourseIncludesLeft">
		<h2>This Course Includes:</h2>
		<ol>
			<li>Comprehensive coverage of foundational and advanced topics</li>
			<li>Hands-on projects to apply learning in real-world scenarios</li>
			<li>Interactive lessons and exercises to enhance practical skills</li>
			<li>Access to industry-standard tools and technologies</li>
			<li>Expert instructors with years of experience in the field</li>
			<li>Real-time support and guidance throughout your learning journey</li>
			<li>Opportunities to collaborate with peers on group projects</li>
			<li>Completion certificates to showcase your expertise</li>
			<li>Post-course resources for continuous learning and growth</li>
		</ol>
	</div>
	<div class="thisCourseIncludesRight">
		<h2>Prerequisites:</h2>
		<ol>
			<li>A basic understanding of computer operations and file management</li>
			<li>Basic familiarity with the internet and web browsers</li>
			<li>No prior programming experience required (for beginner-level courses)</li>
			<li>Basic math skills (for courses involving algorithms or logic)</li>
			<li>A computer with an internet connection to access course materials and exercises</li>
			<li>Willingness to learn new concepts and practice problem-solving techniques</li>
			<li>For advanced courses: some basic understanding of technology</li>
		</ol>

	</div>

</div>

<div class="container courseSyllabus">
	<h2>Get Syllabus</h2>
	<?php foreach ($syllabus as $value) { ?>
		<button class="accordion"><?php echo $value['sname'] ?></button>
		<div class="panel">
			<?php echo $value['scontent'] ?>
			<div class="text-right">
				<h4>View Syllabus In Pdf</h4>
				<p><a class="view_pdf_btn"
						href="<?php echo $this->config->item('image_path') . '/uploads/syllabus/' . $value['spdf']; ?>"
						target="_blank"><?php echo $value['spdf']; ?></a></p>
			</div>
		</div>
	<?php } ?>
</div>

<div class="container courseFee">
	<h2>Course Fee</h2>
	<?php if ($syllabus[0]['cdiscount'] == 1) { ?>
		<p>₹<?php echo $syllabus[0]['cdiscfees']; ?> <strike>₹<?php echo $syllabus[0]['cfees']; ?></strike><span> (In offer
				limited time period)</span></p>
	<?php } else { ?>
		<p> ₹<?php echo $syllabus[0]['cfees']; ?>
		<?php } ?>
</div>


<div class="container courseBuy">
	<a href="<?php echo base_url(); ?>contact-us"><button><i class="fa fa-rocket"></i> Start Your
			<span><?php echo $syllabus[0]['cname'] ?></span>
			Journey
		</button></a>
</div>



<script>
	var acc = document.getElementsByClassName("accordion");
	var i;

	for (i = 0; i < acc.length; i++) {
		acc[i].addEventListener("click", function () {
			this.classList.toggle("active");
			var panel = this.nextElementSibling;
			if (panel.style.maxHeight) {
				panel.style.maxHeight = null;
			} else {
				panel.style.maxHeight = panel.scrollHeight + "px";
			}
		});
	}
</script>