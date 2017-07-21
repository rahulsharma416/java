/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.user.models;

import java.util.ArrayList;

/**
 *
 * @author Rahul Sharma <rahul.sharma416@gmail.com>
 */
public class ResponseModel {

   private int responseCode;
   private String responseMessage;
   private String[][] errors;
   private BaseModel[] data;

   public BaseModel getCObject(String className) {
      if(className.equalsIgnoreCase("usermodel"))
         return new UserModel();

      return null;
   }

   public BaseModel[] getData() {
      return data;
   }

   public void setData(BaseModel[] data) {
      this.data = data;
   }
   
   public int getResponseCode() {
      return responseCode;
   }

   public void setResponseCode(int responseCode) {
      this.responseCode = responseCode;
   }

   public String getResponseMessage() {
      return responseMessage;
   }

   public void setResponseMessage(String responseMessage) {
      this.responseMessage = responseMessage;
   }

   public String[][] getErrors() {
      return errors;
   }

   public void setErrors(String[][] errors) {
      this.errors = errors;
   }
   
}
