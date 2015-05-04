<?php 
class Courses extends CI_Controller
{
	public function show($id)
	{
		$this->output->enable_profiler(TRUE); // enables the profiler
		$this->load->model("Course"); //loads the model
		$course = $this->Course->get_course_by_id($id); // calls the get_course_by_id method
		var_dump($course);
	}
	public function add()
	{
		$this->load->model("Course");
		$course_details = array(
			"title" => "JavaScript",
			"description" => "JavaScript Rocks!"
		);
		$add_course = $this->Course->add_course($course_details);
		if($add_course == TRUE)			
			echo "Course is added!";
	}
} ?>