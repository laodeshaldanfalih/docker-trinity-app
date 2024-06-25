provider "aws" {
  region = var.aws_region
}

variable "aws_region" {
  description = "The AWS region to deploy in"
  type        = string
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

variable "vpc_id" {
  description = "The ID of the VPC"
  type        = string
}

resource "aws_security_group" "launch-wizard-4" {
  name        = "launch-wizard-4"
  description = "launch-wizard-4 created 2024-06-19T14:40:03.310Z"
  vpc_id      = var.vpc_id

  ingress {
    from_port   = 80
    to_port     = 80
    protocol    = "tcp"
    cidr_blocks = ["0.0.0.0/0"]
  }

  ingress {
    from_port   = 9090
    to_port     = 9090
    protocol    = "tcp"
    cidr_blocks = ["0.0.0.0/0"]
    description = "Prometheus"
  }

  ingress {
    from_port   = 22
    to_port     = 22
    protocol    = "tcp"
    cidr_blocks = ["0.0.0.0/0"]
  }

  ingress {
    from_port   = 8080
    to_port     = 8080
    protocol    = "tcp"
    cidr_blocks = ["0.0.0.0/0"]
  }

  ingress {
    from_port   = 4000
    to_port     = 4000
    protocol    = "tcp"
    cidr_blocks = ["0.0.0.0/0"]
    description = "Grafana"
  }

  egress {
    from_port   = 0
    to_port     = 0
    protocol    = "-1"
    cidr_blocks = ["0.0.0.0/0"]
  }

  # Ensure rules are not revoked on delete
  lifecycle {
    prevent_destroy = true
  }
}


resource "aws_instance" "my_ec2_instance" {
  ami             = var.instance_ami
  instance_type   = var.instance_type
  key_name        = var.key_name
  vpc_security_group_ids = [aws_security_group.launch-wizard-4.id]

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
