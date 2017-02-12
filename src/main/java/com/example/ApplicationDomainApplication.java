package com.example;

import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.EnableAutoConfiguration;
import org.springframework.context.annotation.ComponentScan;
import org.springframework.context.annotation.Configuration;

@EnableAutoConfiguration
@Configuration
@ComponentScan({"com.example.controller", "com.example.service"})
public class ApplicationDomainApplication {


	public static void main(String[] args){
		SpringApplication.run(ApplicationDomainApplication.class, args);
	
	}
}
