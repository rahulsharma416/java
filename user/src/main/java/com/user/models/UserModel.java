/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.user.models;

import javax.persistence.*;
import javax.validation.constraints.NotNull;

/**
 *
 * @author Aravind
 */
@Entity
@Table(name = "users")
public class UserModel {
   
   @Id
   private String userId;
   
   @NotNull
   private String username;
   
   @NotNull
   private String password;
   
   @NotNull
   private String email;

   @NotNull
   private String status;
   
   public UserModel() {}

   public UserModel(String userId, String username, String password, String email, String status) {
      this.userId = userId;
      this.username = username;
      this.password = password;
      this.email = email;
      this.status = status;
   }

   public String getUserId() {
      return userId;
   }

   public void setUserId(String userId) {
      this.userId = userId;
   }

   public String getUsername() {
      return username;
   }

   public void setUsername(String username) {
      this.username = username;
   }

   public String getPassword() {
      return password;
   }

   public void setPassword(String password) {
      this.password = password;
   }

   public String getEmail() {
      return email;
   }

   public void setEmail(String email) {
      this.email = email;
   }

   public String getStatus() {
      return status;
   }

   public void setStatus(String status) {
      this.status = status;
   }
   
}
