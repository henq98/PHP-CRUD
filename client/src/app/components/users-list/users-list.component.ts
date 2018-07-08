import { Component, OnInit } from '@angular/core';

import { AuthService } from './../../services/auth.service';
import { User } from '../../services/userSchema';

@Component({
  selector: 'app-users-list',
  templateUrl: './users-list.component.html',
  styleUrls: ['./users-list.component.css']
})
export class UsersListComponent implements OnInit {

  constructor(public authService: AuthService) { }

  ngOnInit() {
    this.authService.getUsers();
  }

  editUser(user: User) {
    this.authService.selectedUser = Object.assign({}, user);
  }

  deleteUser(user: User) {
    if (confirm('Você tem certeza que deseja apagar este contato?')) {
      this.authService.deleteUser(user);
    }
  }
}
