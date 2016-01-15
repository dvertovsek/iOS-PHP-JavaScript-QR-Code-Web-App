//
//  InputViewController.swift
//  QRScan
//
//  Created by Faculty of Organisation and Informatics on 15/01/16.
//  Copyright © 2016 dater. All rights reserved.
//

import UIKit

class InputViewController: UIViewController {

    @IBOutlet var firstNameTxtField: UITextField!
    @IBOutlet var lastNameTxtField: UITextField!
    @IBOutlet var locationTextField: UITextField!
    
    override func viewDidLoad() {
        super.viewDidLoad()
        
    }
    
    @IBAction func onContinuePressed() {
        if firstNameTxtField.text != "" && lastNameTxtField.text != "" && locationTextField.text != ""
        {
            performSegueWithIdentifier("showViewController", sender: self)
        }
        
    }
}
