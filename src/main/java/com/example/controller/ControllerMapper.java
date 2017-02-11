package com.example.controller;


import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.RestController;

import com.example.service.MyService;


@RestController
public class ControllerMapper {
	
	@Autowired
	MyService service;
	
	@RequestMapping(value = "/add", method = RequestMethod.POST)
	public void Add(){
		service.connection();
		String s = service.addAccount();
		service.connectDatabase(s);
	}
	
	@RequestMapping(value = "/edit", method = RequestMethod.POST)
	public void Edit(){
		service.connection();
		String s = service.editAccout();
		service.connectDatabase(s);
	}
}
