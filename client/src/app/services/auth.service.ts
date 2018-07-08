import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { ToastrService } from 'ngx-toastr';

import { User } from './userSchema';

@Injectable({
    providedIn: 'root'
})
export class AuthService {

    apiURL = 'http://localhost/server/request/';
    selectedUser: User = new User();
    usersList;

    constructor(private http: HttpClient, private toastr: ToastrService) { }

    getUsers() {
        return this.http.get(this.apiURL + 'usuarios.php').subscribe((res: any) => {
            this.usersList = [];
            res.map(item => {
                this.usersList.push(item as User);
            });
        });
    }

    registerUser(user) {
        return this.http.post(this.apiURL + 'registrar.php', user).subscribe(res => {
            this.toastr.success(res.toString());
            location.reload();
        }, error => console.log(error));
    }

    deleteUser(user) {
        return this.http.post(this.apiURL + 'deletar.php', user).subscribe(res => {
            this.toastr.success(res.toString());
            location.reload();
        }, error => console.log(error));
    }

    deselectUser() {
        this.selectedUser = {
            nome: null,
            cpf: null,
            email_pes: null,
            email_pro: null,
            tel_mob: null,
            tel_pro: null,
            tel_res: null,
            relatorio: null
        }
    }

}
