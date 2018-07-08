import { Component, OnInit } from '@angular/core';
import { AuthService } from '../../services/auth.service';
import { NgForm } from '@angular/forms';

@Component({
  selector: 'app-user-form',
  templateUrl: './user-form.component.html',
  styleUrls: ['./user-form.component.css']
})
export class UserFormComponent implements OnInit {

  constructor(public authService: AuthService) { }

  ngOnInit() {
    this.authService.getUsers();
    this.authService.deselectUser();
  }

  onSubmit(form: NgForm) {
    if (form.valid) {
      this.authService.registerUser(form.value);
    }
  }  
}
