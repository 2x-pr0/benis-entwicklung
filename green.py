#!/usr/bin/env python

import time

import blinkt


blinkt.set_clear_on_exit()

step = 0

while True:
    if step == 0:
        blinkt.set_pixel(0, 0, 128, 0)
        blinkt.set_brightness(0.2)
        
    step += 1
    blinkt.show()
    time.sleep(0.5)
    exit()
