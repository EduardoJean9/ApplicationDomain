package com.example.controller;
import java.sql.Date;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.RestController;

import com.example.model.Account;
import com.example.model.Account.*;
import com.example.model.AccountObject;
import com.example.service.MyService;

@RestController
//@RequestMapping("/Accounts")
public class ControllerMapper {
	
	@Autowired
	MyService service;
	
	@RequestMapping(value = "/ChartofAccounts.html", method = RequestMethod.GET) //Works value = "/add"
	public void Add(@RequestParam("accountCode") int accountCode, @RequestParam("accountName") String accountName,
					@RequestParam("accountType") accountType type, @RequestParam("normalSide") normalSide normSide,
					@RequestParam("initialBalance") int initBalance, @RequestParam("order") int order,
					@RequestParam("comment") String comment, @RequestParam("addedBy") String addedBy,
					@RequestParam("addedOn") Date addedOn, @RequestParam("active") active active,
					@RequestParam("group") group group, @RequestParam("eventLogID") int eventLogID,
					@RequestParam("errorCodeID") int errorCodeID)
	{	
		Account account = new Account();
		AccountObject ao = new AccountObject();
		account.setAccountCode(accountCode);
		account.setAccountName(accountName);
	//	account.acountType enum
	//	account.normalSide enum
		account.setInitialBalance(initBalance);
		account.setOrder(order);
		account.setComment(comment);
		account.setAddedBy(addedBy);
		account.setAddedOn(addedOn);
	//	account.active enum
	//	account.group enum
		account.setEventLogID(eventLogID);
		account.setErrorCodeID(errorCodeID);
		
		ao.setAccount(account);
		service.connection();
		String s = service.addAccount();
		service.connectDatabaseUpdate(s);
		System.out.println("Account Created");
	}
	
	@RequestMapping(value = "/edit", method = RequestMethod.GET) //Works
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
	
	@RequestMapping(value = "/deactivate", method = RequestMethod.GET) //Works
	public void deactivate(){
		service.connection();
		String s = service.deactivateAccount();
		service.connectDatabaseUpdate(s);
		System.out.println("Account deactivate");
	}
}
