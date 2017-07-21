/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.user.service;

import com.user.models.UserModel;
import org.springframework.data.repository.CrudRepository;
import org.springframework.transaction.annotation.Transactional;

/**
 *
 * @author Aravind
 */
@Transactional
public interface UserService extends CrudRepository<UserModel, String> {
   
   public UserModel findByUsername(String username);
   public UserModel findByEmail(String email);
   public UserModel findByUserId(String userId);
   
}
