//
//  ViewController.swift
//  QRScan
//
//  Created by Faculty of Organisation and Informatics on 15/01/16.
//  Copyright © 2016 dater. All rights reserved.
//

import UIKit
import AVFoundation

import QRCodeReader
class ViewController: UIViewController {
    
    lazy var reader = QRCodeReaderViewController(metadataObjectTypes: [AVMetadataObjectTypeQRCode])
    
    override func viewDidLoad() {
        super.viewDidLoad()
        
        let qrButton = UIBarButtonItem(image: UIImage(named: "qr_code-32"), style: UIBarButtonItemStyle.Plain, target: self, action: "onQRScanButtonSelected")
        
        self.navigationItem.rightBarButtonItem = qrButton
    }
    
    @IBAction private func onQRScanButtonSelected()
    {
        reader.delegate = self
        reader.modalPresentationStyle = .FormSheet
        presentViewController(reader, animated: true, completion: nil)
    }

    override func didReceiveMemoryWarning() {
        super.didReceiveMemoryWarning()
        // Dispose of any resources that can be recreated.
    }
}

extension ViewController: QRCodeReaderViewControllerDelegate
{
    
    func reader(reader: QRCodeReaderViewController, didScanResult result: QRCodeReaderResult) {
        print(result)
        self.dismissViewControllerAnimated(true, completion: nil)
    }
    
    func readerDidCancel(reader: QRCodeReaderViewController) {
        self.dismissViewControllerAnimated(true, completion: nil)
    }
}

