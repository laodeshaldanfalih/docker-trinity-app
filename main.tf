provider "aws" {
  region = "ap-southeast-2"
}

resource "aws_instance" "my_ec2_instance" {
  ami           = var.instance_ami
  instance_type = var.instance_type
  key_name      = var.key_name
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
      host        = self.public_ip
    }
  }
}

output "public_ip" {
  value = aws_instance.my_ec2_instance.public_ip
}
