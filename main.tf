provider "aws" {
  region = "us-east-1"
}

variable "instance_ami" {
  description = "The AMI ID for the EC2 instance"
  type        = string
}

variable "instance_type" {
  description = "The instance type for the EC2 instance"
  type        = string
}

variable "key_name" {
  description = "The key pair name for SSH access"
  type        = string
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
      private_key = file("C:/Users/afand/Downloads/key-for-ec2.pem")
      host        = self.public_ip
    }
  }
}

output "public_ip" {
  value = aws_instance.my_ec2_instance.public_ip
}
