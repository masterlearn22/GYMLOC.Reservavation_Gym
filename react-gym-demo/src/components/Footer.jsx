import React from 'react';

const Footer = () => {
  return (
    <footer className="pt-5 mt-5 footer text-center text-md-left">
      <div className="container">
        <div className="row text-left">
          <div className="mb-4 col-md-3 ms-auto ml-md-auto">
            <div>
              <h6 className="mb-4 font-weight-bolder text-white">GYMLOC</h6>
            </div>
            <div>
              <ul className="flex-row d-flex nav p-0 justify-content-center justify-content-md-start">
                <li className="nav-item">
                  <a className="nav-link pe-1 text-white" href="#" target="_blank">
                    <i className="text-lg fab fa-facebook opacity-8"></i>
                  </a>
                </li>
                <li className="nav-item">
                  <a className="nav-link pe-1 text-white" href="#" target="_blank">
                    <i className="text-lg fab fa-twitter opacity-8"></i>
                  </a>
                </li>
                <li className="nav-item">
                  <a className="nav-link pe-1 text-white" href="#" target="_blank">
                    <i className="text-lg fab fa-instagram opacity-8"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>

          <div className="mb-4 col-md-8 col-sm-6 col-6 text-left">
            <div>
              <h6 className="text-sm text-white">Company</h6>
              <ul className="flex-column nav p-0">
                <li className="nav-item">
                  <a className="nav-link text-white pl-0" href="#">
                    Tentang Kami
                  </a>
                </li>
              </ul>
            </div>
          </div>

          <div className="col-12 mt-4">
            <div className="text-center">
              <p className="my-4 text-sm text-white font-weight-normal">
                All rights reserved. Copyright © {new Date().getFullYear()} GYMLOC React Demo.
              </p>
            </div>
          </div>
        </div>
      </div>
    </footer>
  );
};

export default Footer;
