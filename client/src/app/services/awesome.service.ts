import { Injectable } from '@angular/core';
import {HttpClient} from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class AwesomeService {

  private URI = 'http://localhost:8000/api/auth';

  constructor(
    private http: HttpClient
  ) { }

  login(data) {

  }

  signup(data) {

  }

  goProfile(token): any {
    return this.http.get(`${this.URI}/profile?token=${token}`);
  }
}
