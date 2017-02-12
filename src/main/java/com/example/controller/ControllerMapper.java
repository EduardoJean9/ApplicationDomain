package com.example.controller;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.RestController;
import com.example.service.MyService;

@RestController
@RequestMapping("/Accounts")
public class ControllerMapper {
	
	@Autowired
	MyService service;
	
	@RequestMapping(value = "/add", method = RequestMethod.GET)
	public void Add(){
		service.connection();
		String s = service.addAccount();
		service.connectDatabaseUpdate(s);
		System.out.println("Account Created");
	}
	
	@RequestMapping(value = "/edit", method = RequestMethod.GET)
	public void Edit(){
		service.connection();
		String s = service.editAccout();
		service.connectDatabaseUpdate(s);
		System.out.println("Account edited");
	}
	
	@RequestMapping(value = "/view", method = RequestMethod.GET)
	public void view(){
		service.connection();
		String s = service.viewAccount();
		service.connectDatabaseUpdate(s);
	}
	
	@RequestMapping(value = "/deactivate", method = RequestMethod.GET)
	public void deactivate(){
		service.connection();
		String s = service.deactivateAccount();
		service.connectDatabaseUpdate(s);
		System.out.println("Account deactivate");
	}
}
