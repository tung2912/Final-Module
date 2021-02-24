import {AfterViewInit, Component, OnInit, Output} from '@angular/core';
import {NgbModal, ModalDismissReasons} from '@ng-bootstrap/ng-bootstrap';

import {FormControl, FormGroup, Validators, FormBuilder} from '@angular/forms';
import {AwesomeService} from '../../services/awesome.service';
import {TokenService} from '../../services/token.service';
import {Router} from '@angular/router';
import {AuthService} from '../../services/auth.service';
import {faUser} from '@fortawesome/free-solid-svg-icons';
import {Observable} from 'rxjs';
import {pluck} from 'rxjs/operators';


@Component({
  selector: 'app-nav',
  templateUrl: './nav.component.html',
  styleUrls: ['./nav.component.scss']
})
export class NavComponent implements OnInit, AfterViewInit {
  faUser = faUser;
  owner;
  closeResult = '';
  token = '';
  public formLogin: FormGroup;
  public error = null;
  public loggedIn: boolean;

  constructor(private modalService: NgbModal,
              private formBuilder: FormBuilder,
              private Awesome: AwesomeService,
              private Token: TokenService,
              private router: Router,
              private Auth: AuthService) {
  }

  ngOnInit(): void {

    this.token = localStorage.getItem('token');
    this.Auth.authStatus.subscribe(
      value => this.loggedIn = value
    );

    this.formLogin = this.formBuilder.group({
      email: [null, [Validators.required, Validators.email]],
      password: [null, [Validators.required, Validators.minLength(6)]]
    });


  }

  get ownerName$(): Observable<string> {
    return this.Auth.owner$.pipe(
      pluck('name')
    );
  }

  ngAfterViewInit(): void {
    if (this.loggedIn) {
      this.prepareDropDown();
    }
  }

  // tslint:disable-next-line:typedef
  toggle() {
  toggle(): void {
    const hamburger = document.querySelector('.hamburger');
    const mobileMenu = document.querySelector('.header .header__nav-bar .header__nav-list ul');
    const bar = document.querySelector('.bar');
    hamburger.classList.toggle('active');
    mobileMenu.classList.toggle('active');
    bar.classList.toggle('active');
  }

  open(content): void {
    this.modalService.open(content, {ariaLabelledBy: 'modal-basic-title'}).result.then((result) => {
      this.closeResult = `Closed with: ${result}`;
    }, (reason) => {
      this.closeResult = `Dismissed ${this.getDismissReason(reason)}`;
    });
  }

  private getDismissReason(reason: any): string {
    if (reason === ModalDismissReasons.ESC) {
      return 'by pressing ESC';
    } else if (reason === ModalDismissReasons.BACKDROP_CLICK) {
      return 'by clicking on a backdrop';
    } else {
      return `with: ${reason}`;
    }
  }

  submitLogin(): void {
    const {email, password} = this.formLogin.value;

    this.Auth.login(email, password).subscribe(
      data => {
        this.handleLogInSuccess(data);
        document.getElementById('clsBtn').click();
      },
      error => this.handleError(error)
    );
  }

  goProfile(): void {
    this.Awesome.goProfile(this.token).subscribe(
      data => {
        this.owner = data;
        this.router.navigateByUrl('profile');
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

  handleError(error): void {
    this.error = error.error.error;
  }

  logout(event: MouseEvent): void {
    event.preventDefault();
    this.Token.remove();
    localStorage.removeItem('loggedUser');
    localStorage.removeItem('owner');
    this.Auth.changeAuthStatus(false);
    this.router.navigateByUrl('');
  }

  goToRegisterPage(): void {
    document.getElementById('clsBtn').click();
    this.router.navigateByUrl('signup');
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
}
