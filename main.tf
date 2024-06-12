provider "aws" {
  region = "ap-southeast-2"
}

resource "aws_instance" "my_ec2_instance" {
  ami           = "ami-080660c9757080771"
  instance_type = "t2.micro"
  key_name      = "key-for-ec2"
  tags = {
    Name = "trinity-app"
  }

  provisioner "remote-exec" {
    inline = [
      "sudo apt update",
      "sudo apt upgrade -y",
      "docker --version",
      "docker ps"
    ]

    connection {
      type        = "ssh"
      user        = "ubuntu"
      private_key = file("~/.ssh/key-for-ec2.pem")
      host        = aws_instance.my_ec2_instance.public_ip
    }
  }
}
