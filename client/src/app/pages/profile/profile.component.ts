import {Component, Input, OnInit} from '@angular/core';
import {Owner} from '../../shared/models/owner.model';
import {AuthService} from '../../services/auth.service';
import {Router} from '@angular/router';

@Component({
  selector: 'app-profile',
  templateUrl: './profile.component.html',
  styleUrls: ['./profile.component.scss']
})
export class ProfileComponent implements OnInit {
  owner: Owner;

  constructor(private auth: AuthService, private router: Router) { }

  ngOnInit(): void {
    this.auth.owner$.subscribe(owner => this.owner = owner);
    console.log(this.owner);
  }

  backToHome(): void {
    this.router.navigateByUrl('');
  }

}
