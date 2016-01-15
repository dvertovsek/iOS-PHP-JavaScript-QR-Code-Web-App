//
//  InputViewController.swift
//  QRScan
//
//  Created by Faculty of Organisation and Informatics on 15/01/16.
//  Copyright © 2016 dater. All rights reserved.
//

import UIKit

import Alamofire

class InputViewController: UIViewController {

    @IBOutlet var firstNameTxtField: UITextField!
    @IBOutlet var lastNameTxtField: UITextField!
    @IBOutlet var locationTextField: UITextField!
    @IBOutlet var usernameTxtField: UITextField!
    
    override func viewDidLoad() {
        super.viewDidLoad()
        
    }
    
    @IBAction func onContinuePressed() {
        if firstNameTxtField.text != "" && lastNameTxtField.text != "" && locationTextField.text != "" && usernameTxtField.text != ""
        {
            let username = usernameTxtField.text!
            let firstname = firstNameTxtField.text!
            let lastname = lastNameTxtField.text!
            let location = locationTextField.text!
            let params = [
                "username" : username,
                "first_name" : firstname,
                "last_name" : lastname,
                "location" : location
            ]
            Alamofire.request(.POST, "https://whatscrap-dare1234.rhcloud.com/api/newuser", parameters: params)
                .responseJSON { response in
                    self.performSegueWithIdentifier("showViewController", sender: self)
            }
        }
        
    }
    
    override func prepareForSegue(segue: UIStoryboardSegue, sender: AnyObject?) {
        let destination = segue.destinationViewController as! ViewController
        destination.username = usernameTxtField.text!
    }
}
