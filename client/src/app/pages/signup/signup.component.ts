import { Component, OnInit } from '@angular/core';
import {FormBuilder, FormGroup, Validators} from '@angular/forms';
import {Router} from '@angular/router';
import {TokenService} from '../../services/token.service';
import {AuthService} from '../../services/auth.service';

@Component({
  selector: 'app-signup',
  templateUrl: './signup.component.html',
  styleUrls: ['./signup.component.scss']
})
export class SignupComponent implements OnInit {
  public formSignUp: FormGroup;
  public error = null;
  token = '';
  owner;

  constructor(private formBuilder: FormBuilder,
              private router: Router,
              private Token: TokenService,
              private Auth: AuthService) { }

  ngOnInit(): void {
    this.formSignUp = this.formBuilder.group({
      email: [null, [Validators.required, Validators.email]],
      password: [null, [Validators.required, Validators.minLength(6)]],
      name: [null, [Validators.required]],
      password_confirmation: [null, [Validators.required]],
      address: [null, [Validators.required]],
      phone: [null, [Validators.required]],
    });
  }

  submitSignUp(): void {
    this.Auth.signUp(this.formSignUp.value).subscribe(
      data => {
        this.loginFromSignup();
        alert('Signup successfully');
        this.router.navigateByUrl('');
      },
      error => {
        const errors = error.error;

        // console.log(errors);

        const errorMessage = errors.reduce(
          (mes, errObj) => mes + Object.values(errObj).reduce((itemMes, errList: any) => itemMes + errList.join(''), ''),
          ''
        );

        // console.log(errorMessage);
        this.error = errorMessage;
      }
    );
  }

  loginFromSignup(): void {
    const {
      email,
      password
    } = this.formSignUp.value;

    this.Auth.login(email, password).subscribe(
      data => {
        this.handleLogInSuccess(data);
      }
    );
  }

  handleLogInSuccess(data): void {
    this.Token.handle(data.token);
    this.Auth.changeAuthStatus(true);
    localStorage.setItem('loggedUser', data.owner.name);
    localStorage.setItem('owner', JSON.stringify(data.owner));

    this.prepareDropDown();
  }

  private prepareDropDown(): void {
    setTimeout(() => {
      document.querySelector('.submenu').addEventListener('mouseover', () => {
        document.querySelector('.dropdown__content').classList.add('show');
      });
      document.querySelector('.submenu').addEventListener('mouseout', () => {
        document.querySelector('.dropdown__content').classList.remove('show');
      });
    },0);
  }


  // handleError(error) {
  //   this.error = error.error.error;
  // }
}
