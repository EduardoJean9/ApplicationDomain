package com.example;

import java.sql.DriverManager;
import java.sql.SQLException;
import java.sql.Statement;
import java.sql.Connection;

import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.EnableAutoConfiguration;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.context.annotation.ComponentScan;
import org.springframework.context.annotation.Configuration;


@EnableAutoConfiguration
@Configuration
@ComponentScan({"com.example.controller", "com.example.service"})
public class ApplicationDomainApplication {
	
	//String url = "jdbc:mysql://localhost:85/chart_of_accounts";

	
	 public static void connection(){
		 try {
				Class.forName("com.mysql.jdbc.Driver");
				System.out.println("Worked");
			} catch (ClassNotFoundException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
	 }
	
	public static void connectDatabase(String query){
		connection();
		String url = "jdbc:mysql://localhost/chart_of_accounts";
		String username = "root";
		String password = "";
		try {
			Connection con = DriverManager.getConnection(url,username,password);
			Statement stat = con.createStatement();
			stat.executeUpdate(query);
			System.out.println("Good");
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
	}

	public static void main(String[] args){
		SpringApplication.run(ApplicationDomainApplication.class, args);
		String query = "INSERT INTO `accounts`(`Account Code`, `Account Name`, `Account Type`, `Normal Side`, `Initial Balance`, `Order`, `Comment`, `Added By`, `Added On`, `Active`, `Group`, `Event Log ID`, `Error Code ID`) VALUES (100,'Cash','Asset','LEFT',0.00,1,'Done','Skip Bassey','2017:02:09:12:08:01','yes','Current Asset',1,1)";
		connection();
		connectDatabase(query);
		/*Service service = new Service();
		service.connection();
		service.connectDatabase();*/
	}
}
