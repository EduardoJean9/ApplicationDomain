package com.example.model;

import java.sql.Date;

public class Account {
	
	public int getAccountCode() {
		return accountCode;
	}
	public void setAccountCode(int accounCode) {
		this.accountCode = accounCode;
	}
	public String getAccountName() {
		return accountName;
	}
	public void setAccountName(String accountName) {
		this.accountName = accountName;
	}
	public double getInitialBalance() {
		return initialBalance;
	}
	public void setInitialBalance(double initialBalance) {
		this.initialBalance = initialBalance;
	}
	public int getOrder() {
		return order;
	}
	public void setOrder(int order) {
		this.order = order;
	}
	public String getComment() {
		return comment;
	}
	public void setComment(String comment) {
		this.comment = comment;
	}
	public String getAddedBy() {
		return addedBy;
	}
	public void setAddedBy(String addedBy) {
		this.addedBy = addedBy;
	}
	public Date getAddedOn() {
		return addedOn;
	}
	public void setAddedOn(Date addedOn) {
		this.addedOn = addedOn;
	}
	public int getEventLogID() {
		return eventLogID;
	}
	public void setEventLogID(int eventLogID) {
		this.eventLogID = eventLogID;
	}
	public int getErrorCodeID() {
		return errorCodeID;
	}
	public void setErrorCodeID(int errorCodeID) {
		this.errorCodeID = errorCodeID;
	}
	
	
	public int accountCode;
	public String accountName;
	public enum accountType{Asset,Liability, OwnersEquity, Revenue, Expense};
	public enum normalSide{Left,Right};
	public double initialBalance; //might need to change type
	public int order;
	public String comment;
	public String addedBy;
	public Date addedOn;
	public enum active{yes,no};
	public enum group{currrentAsset, longTermAsset, currentLiability, longTermLiability, reveunes, expenses};
	public int eventLogID;
	public int errorCodeID;
	
	

}
