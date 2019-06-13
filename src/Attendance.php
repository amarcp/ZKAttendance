<?php
namespace ZKAttendance;

use \DateTime;

class Attendance {
	const VALIDATED_BY_PASSWORD = 'password';
	const VALIDATED_BY_FINGERPRINT = 'fingerprint';

	private $userId;
	private $type;
	private $status;
	private $time;

	public function getType(){
		return $this->type;
	}

	public function getUserId(){
		return $this->userId;
	}

	public function getStatus(){
		return $this->status;
	}

	public function isOut(){
		return ($this->type & 0x20) > 0;
	}

	public function validatedBy(){
		return ($this->type & 0x08) ? static::VALIDATED_BY_FINGERPRINT : static::VALIDATED_BY_PASSWORD;
	}

	/**
	 * @return \DateTime
	 */
	public function getDateTime(){
		return $this->time;
	}

	public function getDate(){
		return $this->time->format("Y-m-d");
	}

	public function getTime(){
		return $this->time->format("H:i:s");
	}

	public function __construct($userId, DateTime $dateTime, $type, $status){
		$this->userId = $userId;
		$this->time = $dateTime;
		$this->type = $type;
		$this->status = $status;
	}
}
