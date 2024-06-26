Skip to content
Navigation Menu
laodeshaldanfalih
/
docker-trinity-app

Type / to search

Code
Issues
Pull requests
Actions
Projects
1
Wiki
Security
Insights
Editing README.md in docker-trinity-app
Breadcrumbsdocker-trinity-app
/
README.md
in
update-readme

Edit

Preview
Indent mode

Spaces
Indent size

4
Line wrap mode

Soft wrap
Editing README.md file contents
Selection deleted
550
551
552
553
554
555
556
557
558
559
560
561
562
563
564
565
566
567
568
569
570
571
572
573
574
575
576
577
578
579
580
581
582
583
584
585
586
587
588
589
590
591
592
593
594
595
596
597
598
599
600
601
602
603
604
605
606
607
608
609
610
611
612
613
614
615
616
617
618
619
620
621
622
623
624
625
626
627
628
629
630
631

        
        # The full public facing url you use in browser, used for redirects and emails
        # If you use reverse proxy and sub path specify full url (with sub path)
        ;root_url = %(protocol)s://%(domain)s:%(http_port)s/
   
    ```
    
2. Grafana Dashboard
      ```sh
    Now we will go to Grafana Dashboard. In there, we will set up necessarry configuration so that it can GET and show your previous Prometheus metric data.
      -> Username = admin
         Password = admin
    ```
      ![image](https://github.com/laodeshaldanfalih/docker-trinity-app/assets/115178487/e1ae357e-7826-4e4e-9ba4-5f75c697221b)

   
4. Configure Prometheus as Grafana DataSource
![image](https://github.com/laodeshaldanfalih/docker-trinity-app/assets/115178487/ee5e452f-95be-41bd-9a17-3b578f385c97)

   ```sh    
    -> Search Data Sources
   
    -> Click Add Data Sources and seleck Prometheus

    -> Configure Prometheus data source by fill the HTTP URL

    -> Save & Test
    ```
5. Creating Grafana Dashboard
   ```sh
![image](https://github.com/laodeshaldanfalih/docker-trinity-app/assets/115178487/20a235fd-003d-415c-87ea-9009d8a39e94)

![image](https://github.com/laodeshaldanfalih/docker-trinity-app/assets/115178487/621239f7-9291-4d3a-84a3-67a129a4873c)

![image](https://github.com/laodeshaldanfalih/docker-trinity-app/assets/115178487/3573b5f9-25b7-4a4a-b67e-f347dd630a43)

![image](https://github.com/laodeshaldanfalih/docker-trinity-app/assets/115178487/533705f8-a8b2-415b-b75d-f43285b3e44f)

    ```

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- CONTRIBUTING -->

## Contributing

Contributions are what make the open source community such an amazing place to learn, inspire, and create. Any contributions you make are **greatly appreciated**.

If you have a suggestion that would make this better, please fork the repo and create a pull request. You can also simply open an issue with the tag "enhancement".
Don't forget to give the project a star! Thanks again!

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- LICENSE -->

## License

Coming soon...

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- CONTACT -->

## Contact

### Faqih - 5026211001@student.its.ac.id

### Mirza - 5026211126@student.its.ac.id

### Shaldan - 50262111178@student.its.ac.id

Project Link: [https://github.com/laodeshaldanfalih/docker-trinity-app](https://github.com/laodeshaldanfalih/docker-trinity-app)

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- MARKDOWN LINKS & IMAGES -->
Use Control + Shift + m to toggle the tab key moving focus. Alternatively, use esc then tab to move to the next interactive element on the page.
No file chosen
Attach files by dragging & dropping, selecting or pasting them.
Copied! 
