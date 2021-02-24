import { Component, OnInit } from '@angular/core';
import { NgbCarouselConfig } from '@ng-bootstrap/ng-bootstrap';

@Component({
  selector: 'app-estate-detail',
  templateUrl: './estate-detail.component.html',
  styleUrls: ['./estate-detail.component.scss']
})
export class EstateDetailComponent implements OnInit {

  constructor(config: NgbCarouselConfig) {
    config.interval = 10000;
    config.wrap = true;
    config.keyboard = false;
    config.pauseOnHover = false;
  }

  items = ['By proceeding, you consent to receive calls and texts at the number you provided, including marketing by autodialer and prerecorded and artificial voice, and email, from realtor.com and others about your inquiry and other home-related matters, but not as a condition of any purchase; this applies regardless of whether you check, or leave un-checked, any box above. You also agree to our Terms of Use, and to our Privacy Policy regarding the information relating to you. Msg/data rates may apply. This consent applies even if you are on a corporate, state or national Do Not Call list.'];
  ngOnInit(): void {
  }
}
