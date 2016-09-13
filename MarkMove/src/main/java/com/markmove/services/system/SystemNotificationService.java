package com.markmove.services.system;

public interface SystemNotificationService {
    void addInfoMessage(String msg);
    void addErrorMessage(String msg);
}
