package com.example.service;
import java.sql.*;

import org.springframework.stereotype.Service;

@Service
public class MyService {
	String url = "jdbc:mysql://localhost:85/chart_of_accounts";
	
	 public void connection(){
		 try {
				Class.forName("com.mysql.jdbc.Driver");
			} catch (ClassNotFoundException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
	 }
	
	public void connectDatabaseUpdate(String query){
		connection();
		String url = "jdbc:mysql://localhost/chart_of_accounts";
		String username = "root";
		String password = "";
		try {
			Connection con = DriverManager.getConnection(url,username,password);
			Statement stat = con.createStatement();
			stat.executeUpdate(query);
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
	}
	
	public void connectDatabaseExecute(String query){
		connection();
		String url = "jdbc:mysql://localhost/chart_of_accounts";
		String username = "root";
		String password = "";
		try {
			Connection con = DriverManager.getConnection(url,username,password);
			Statement stat = con.createStatement();
			stat.executeQuery(query);
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
	}
	
	public String addAccount(){
		String query = "INSERT INTO `accounts`(`Account Code`, `Account Name`, `Account Type`, `Normal Side`, `Initial Balance`, `Order`, `Comment`, `Added By`, `Added On`, `Active`, `Group`, `Event Log ID`, `Error Code ID`)" 
				+ "VALUES (100,'Cash','Asset','Left',0.00,1,'Done','Skip Bassey','2017:02:09:12:08:01','Yes','Current Asset',1,1)";
		return query;		
	}
	
	public String editAccout(){
		String query ="UPDATE `accounts` SET `Normal Side` = 'Right' WHERE `Account Name` = 'Cash'";
		return query;
	}
	
	public String viewAccount(){
		String query = "SELECT * FROM `Acounts`";
		return query;
	}
	
	public String deactivateAccount(){
		String query = "UPDATE `accounts` SET `Active` = 'No' WHERE `Account Name` = 'Cash'";
		return query;
	}
	
}
