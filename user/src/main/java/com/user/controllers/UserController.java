/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.user.controllers;

import com.user.models.UserModel;
import com.user.service.UserService;
import java.util.UUID;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.ResponseBody;

/**
 *
 * @author Aravind
 */
@Controller
@SpringBootApplication
public class UserController {

   @Autowired
   private UserService userService;
   
   public String getUUID() {
      return UUID.randomUUID().toString();
   }
   
   @RequestMapping(value = "/register", method = RequestMethod.POST)
   @ResponseBody
   public String registerUser(String username, String password, String email) {
      String response = "";
      UserModel userModel = new UserModel(getUUID(), username, password, email, "active");
      try {
         userService.save(userModel);
      } catch (Exception e) {
         e.printStackTrace();
         return response = "Error creating user.";
      }
      return response = "Successfully created user.";
   } 
}
