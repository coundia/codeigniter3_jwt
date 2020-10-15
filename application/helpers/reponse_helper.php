<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @param $response
 * @param int $statusHeader
 */
	function reponse($codeRetour=1,$message="SUCCES",$data=NULL,$statusHeader=200)
	{
		$response=array();
		$ci = get_instance();
		$ci->output->set_content_type('application/json');
		if($codeRetour!=1)
		$ci->output->set_status_header($codeRetour);

		if(is_array($message)){
			$data=$message;
			if(isset($message["message"]))
				$message=$message["message"];
			else
				$message="SUCCESS";
		}
		if($codeRetour ==200)
			$codeRetour=1;
        $response["codeRetour"]=$codeRetour;
		$response["messageRetour"]=$message;
		$response["data"]=$data;

		$ci->output->set_output(json_encode($response));
		return true;

	}

