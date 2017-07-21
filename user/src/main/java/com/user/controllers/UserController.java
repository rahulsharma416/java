/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.user.controllers;

import com.user.models.ResponseModel;
import com.user.models.UserModel;
import com.user.service.UserService;
import java.util.Iterator;
import java.util.List;
import java.util.UUID;
import javax.validation.Valid;
import org.hibernate.Criteria;
import org.hibernate.Session;
import org.hibernate.SessionFactory;
import org.hibernate.criterion.MatchMode;
import org.hibernate.criterion.Restrictions;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.context.annotation.Bean;
import org.springframework.orm.jpa.vendor.HibernateJpaSessionFactoryBean;
import org.springframework.stereotype.Controller;
import org.springframework.validation.Errors;
import org.springframework.validation.FieldError;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.ResponseBody;

/**
 *
 * @author Rahul Sharma
 */
@Controller
@SpringBootApplication
public class UserController {

   @Autowired
   private UserService userService;
   @Autowired
   private SessionFactory sessionFactory;

   @Bean
   public HibernateJpaSessionFactoryBean sessionFactory() {
       return new HibernateJpaSessionFactoryBean();
   }

   public String getUUID() {
      return UUID.randomUUID().toString();
   }
   
   @RequestMapping(value = "/users/register", method = RequestMethod.POST)
   @ResponseBody
   public ResponseModel registerUser(@Valid UserModel usrModel, Errors errors ) {
      ResponseModel rmObj = new ResponseModel();
      UserModel userModel = new UserModel(getUUID(), usrModel.getUsername(), usrModel.getPassword(), 
              usrModel.getEmail(), "active");
      try {
         userService.save(userModel);
         rmObj.setResponseCode(200);
         rmObj.setResponseMessage("User created successfully.");
      } catch (Exception e) {
         rmObj.setResponseCode(500);
         List lstObj = errors.getAllErrors();
         Iterator itrObj = lstObj.iterator();
         if(itrObj!=null) {
            String[][] strErrors = new String[lstObj.size()][2];
            int counter = 0;
            while(itrObj.hasNext()) {
               FieldError fldErr = (FieldError)itrObj.next();               
               strErrors[counter][0] = fldErr.getField();
               strErrors[counter][1] = fldErr.getDefaultMessage();
               ++counter;
            }
            rmObj.setResponseMessage("Failed creating user.");
            rmObj.setErrors(strErrors);
         }
      }
      return rmObj;
   } 
   
   @RequestMapping(value = "/users/update", method = RequestMethod.POST)
   @ResponseBody
   public ResponseModel updateUser(@Valid UserModel usrModel, Errors errors ) {
      ResponseModel rmObj = new ResponseModel();
      UserModel userModel = userService.findOne(usrModel.getUserId());
      if(userModel != null) {
         try {
            if(usrModel.getEmail()!=null)
               userModel.setEmail(usrModel.getEmail());
            if(usrModel.getPassword()!=null)
               userModel.setPassword(usrModel.getPassword());
            if(usrModel.getStatus()!=null)
               userModel.setStatus(usrModel.getStatus());
            userService.save(userModel);
            rmObj.setResponseCode(200);
            rmObj.setResponseMessage("User updated successfully.");
         } catch (Exception e) {
            rmObj.setResponseCode(500);
            List lstObj = errors.getAllErrors();
            Iterator itrObj = lstObj.iterator();
            if(itrObj!=null) {
               String[][] strErrors = new String[lstObj.size()][2];
               int counter = 0;
               while(itrObj.hasNext()) {
                  FieldError fldErr = (FieldError)itrObj.next();               
                  strErrors[counter][0] = fldErr.getField();
                  strErrors[counter][1] = fldErr.getDefaultMessage();
                  ++counter;
               }
               rmObj.setResponseMessage("Failed updating user.");
               rmObj.setErrors(strErrors);
            }
         }
      } else {
         rmObj.setResponseCode(500);
         String[][] strErrors = new String[1][2];
         strErrors[0][0] = "userId";
         strErrors[0][1] = "Invalid user id provided.";
         rmObj.setResponseMessage("Failed updating user.");
         rmObj.setErrors(strErrors);
      }
      return rmObj;
   } 
   
   @RequestMapping(value = "/users/search", method = RequestMethod.POST)
   @ResponseBody
   public ResponseModel getUsers(@RequestParam(value = "key") String searchTerm, Errors errors) {
      ResponseModel rmObj = new ResponseModel();
      
      Session session = null;
      try {
         session = sessionFactory.getCurrentSession();
      } catch (Exception exp) {
         System.out.println("Creating new session.");
         session = sessionFactory.openSession();
      }
      System.out.println("Key: " + searchTerm);
      Criteria ctrObj = session.createCriteria(UserModel.class);
      ctrObj.add(Restrictions.or(Restrictions.like("username", searchTerm, MatchMode.ANYWHERE), 
              Restrictions.like("email", searchTerm, MatchMode.ANYWHERE)));
      List lstResults = ctrObj.list();
      if(lstResults != null) {
         System.out.println("SIZE: " + lstResults.size());
         try {
            UserModel[] userModelList = new UserModel[lstResults.size()];
            Iterator itr = lstResults.iterator();
            int counter = -1;
            while(itr.hasNext()) {
               userModelList[++counter] = (UserModel) itr.next();
            }
            rmObj.setData(userModelList);
            rmObj.setResponseCode(200);
            rmObj.setResponseMessage("Success");
         } catch (Exception e) {
            rmObj.setResponseCode(500);
            rmObj.setResponseMessage("Failed fetching the results.");
         }
      } else {
         rmObj.setResponseCode(500);
         String[][] strErrors = new String[1][2];
         strErrors[0][0] = "userId";
         strErrors[0][1] = "Invalid user id provided.";
         rmObj.setResponseMessage("Failed updating user.");
         rmObj.setErrors(strErrors);
      }
      return rmObj;
   } 
}
