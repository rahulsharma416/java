import {Http, Response} from "@angular/http";

export class UsersService {
    baseUrl:String = "http://localhost:8080/";
    apiCalls:String[];

    UsersService() {
        this.apiCalls['search'] = 'users/search';
        this.apiCalls['register'] = 'users/register';
        this.apiCalls['update'] = 'users/update';
    }

    getLoginUser():Boolean {
        .http.
        
    }
}